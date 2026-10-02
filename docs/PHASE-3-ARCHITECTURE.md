# BẢN THIẾT KẾ KIẾN TRÚC TỔNG THỂ – PHASE 3 (ARCHITECTURE SPEC)
## MULTI-PROJECT, MULTI-DATABASE & THEME ISOLATION ENGINE CHO LARAVEL 12 CORE

> **Mục tiêu tối thượng:** Một Laravel Core tập trung $\rightarrow$ Phục vụ không giới hạn các Project độc lập. Mỗi Project sở hữu Theme riêng, Database riêng, Dữ liệu người dùng riêng và Tên miền riêng, trong khi hệ thống lõi Core / CMS SuperAdmin được kiểm soát thống nhất.

---

## 1. NGUYÊN TẮC CỐT LÕI (CORE PRINCIPLES)

1. **Một Mã Nguồn Lõi Duy Nhất (Single Source Core):** Không nhân bản project folder thành `laravel-project-a`, `laravel-project-b`. Mọi website đều khởi chạy trên một hệ điều phối Laravel 12 thống nhất.
2. **Cách Ly Tuyệt Đối (Strict Data & Theme Isolation):**
   * Project A không thể đọc hoặc can thiệp vào Database của Project B.
   * Theme của Project A không ảnh hưởng tới CSS/JS của Project B hay Core Admin.
   * Lỗi kết nối ở Project A không được làm sập các Project khác.
3. **Không Rò Rỉ Kết Nối (Zero Connection State Leakage):** Tuyệt đối không thay đổi `DB::setDefaultConnection()` vĩnh viễn trên toàn hệ thống trong các môi trường persistent (như Octane, Swoole hoặc PHP-FPM workers). Mọi dynamic connection phải được giải phóng và purge sạch sau khi request hoàn tất (`terminating` lifecycle).

---

## 2. VÒNG ĐỜI REQUEST (HTTP REQUEST LIFECYCLE)

```text
1. User Request (VD: ehenho.local hoặc /{projectCode})
       │
       ▼
2. ProjectResolver Middleware
   - Trích xuất Host / Domain: `ehenho.local` $\rightarrow$ Match cột `domain` / `external_domain`
   - Hoặc trích xuất Route Prefix: `/{projectCode}` $\rightarrow$ Match cột `code`
   - Nạp thực thể `Project` & `Tenant` tương ứng
       │
       ▼
3. Khởi tạo ProjectContext (Singleton)
   - Lưu trữ: `current_project`, `project_id`, `tenant_id`, `theme_id`, `db_config`
   - Chia sẻ `$currentProject` cho toàn bộ Blade Views
       │
       ▼
4. DatabaseResolver
   - Kiểm tra cấu hình database của Project:
     * Mode 1: Central Shared (dùng database `core` với tenant query scoping)
     * Mode 2: Dedicated Isolated Database (dùng connection `project_{code}` trỏ về DB riêng)
   - Cấu hình dynamic config `database.connections.project`
   - Kiểm tra kết nối PDO hợp lệ
       │
       ▼
5. ThemeResolver
   - Xác định theme tương ứng (VD: `ehenho`)
   - Đăng ký View Namespace: `View::addNamespace('theme', resource_path('views/themes/ehenho'))`
   - Đảm bảo assets nạp từ `public/themes/ehenho/`
       │
       ▼
6. Laravel Routing & Controller Execution
   - Thực thi Controller chuyên biệt hoặc CMS dynamic router
   - Eloquent Model thực hiện query:
     * Model Central $\rightarrow$ Connection `mysql`
     * Model Project $\rightarrow$ Connection `project`
       │
       ▼
7. Blade View Rendering
   - Render Layout & Reusable Components của theme
   - Binding dữ liệu thực tế từ Database (Không mock data)
       │
       ▼
8. Response Terminating Hook (Dọn dẹp)
   - `DB::purge('project')`
   - `DB::disconnect('project')`
   - Reset connection mặc định về `mysql` (Central)
```

---

## 3. THIẾT KẾ CƠ CHẾ RESOLVER CHUYÊN BIỆT

### 3.1. ProjectResolver (`app/Services/Tenancy/ProjectResolver.php`)
```php
namespace App\Services\Tenancy;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectResolver
{
    public function resolve(Request $request): ?Project
    {
        $host = $request->getHost();

        // 1. Phân giải ưu tiên qua Domain / External Domain
        $project = Project::where('external_domain', $host)
            ->orWhere('subdomain', 'like', "%://{$host}%")
            ->first();

        if ($project) {
            return $project;
        }

        // 2. Phân giải qua Route Parameter {projectCode}
        $code = $request->route('projectCode');
        if ($code) {
            return Project::where('code', $code)->first();
        }

        // 3. Phân giải qua Path Segment đầu tiên (fallback)
        $firstSegment = $request->segment(1);
        if ($firstSegment && !in_array($firstSegment, ['superadmin', 'admin', 'api', 'build', 'vendor'])) {
            $candidate = Project::where('code', $firstSegment)->first();
            if ($candidate) {
                return $candidate;
            }
        }

        return null;
    }
}
```

### 3.2. DatabaseResolver (`app/Services/Tenancy/DatabaseResolver.php`)
```php
namespace App\Services\Tenancy;

use App\Models\Project;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseResolver
{
    public function connect(Project $project): void
    {
        $tenant = $project->tenant;
        $dbName = $tenant?->database_name ?: ($project->deployment_config['database']['name'] ?? null);

        // Nếu project không yêu cầu DB riêng -> Sử dụng Shared Database với Scoping
        if (!$dbName || $dbName === config('database.connections.mysql.database')) {
            Config::set('database.connections.project', config('database.connections.mysql'));
            return;
        }

        // Cấu hình Dynamic Connection cho Project Database
        $connectionConfig = array_merge(config('database.connections.mysql'), [
            'database' => $dbName,
            'username' => $project->deployment_config['database']['user'] ?? config('database.connections.mysql.username'),
            'password' => $project->deployment_config['database']['password'] ?? config('database.connections.mysql.password'),
        ]);

        Config::set('database.connections.project', $connectionConfig);
        DB::purge('project');

        try {
            DB::connection('project')->getPdo();
        } catch (\Throwable $e) {
            Log::error("Failed connecting to Project DB [{$dbName}]: " . $e->getMessage());
            // Fallback an toàn về Central DB nếu DB riêng chưa sẵn sàng
            Config::set('database.connections.project', config('database.connections.mysql'));
        }
    }

    public function disconnect(): void
    {
        try {
            DB::purge('project');
            DB::disconnect('project');
        } catch (\Throwable $e) {
            // Suppress disconnect error
        }
    }
}
```

### 3.3. ThemeResolver (`app/Services/Tenancy/ThemeResolver.php`)
```php
namespace App\Services\Tenancy;

use App\Models\Project;
use Illuminate\Support\Facades\View;

class ThemeResolver
{
    public function resolve(Project $project): string
    {
        $theme = $project->tenant?->settings['theme'] 
            ?? $project->features['theme'] 
            ?? ($project->code === 'viettinmart-eco' ? 'viettinmartdemo' : 
               (str_contains($project->code, 'wkcomputer') ? 'wkcomputerdemo' : 'ehenho'));

        $themePath = resource_path("views/themes/{$theme}");
        if (is_dir($themePath)) {
            // Đăng ký namespace `theme::` để view gọi rõ ràng: view('theme::pages.home')
            View::addNamespace('theme', $themePath);
            View::getFinder()->prependLocation($themePath);
        }

        return $theme;
    }
}
```

---

## 4. RANH GIỚI MODEL & KẾT NỐI DATABASE (MODEL BOUNDARIES)

```text
┌────────────────────────────────────────────────────────┐
│                   CENTRAL DATABASE                     │
│                 (Connection: 'mysql')                  │
├────────────────────────────────────────────────────────┤
│ • Project (app/Models/Project.php)                     │
│ • Tenant (app/Models/Tenant.php)                       │
│ • User (SuperAdmin & Kỹ thuật viên Agency)             │
│ • Role & Permission (Spatie RBAC toàn cục)            │
│ • CpanelProfile & DeploymentProfile                    │
│ • ProjectMember & Department                           │
└────────────────────────────────────────────────────────┘
                           │
                           │ Độc lập hoàn toàn
                           ▼
┌────────────────────────────────────────────────────────┐
│                   PROJECT DATABASE                     │
│                (Connection: 'project')                 │
├────────────────────────────────────────────────────────┤
│ • Profile (Hồ sơ người dùng eHenho)                    │
│ • UserMember (Thành viên website dự án)                │
│ • Message & Conversation (Tin nhắn nội bộ)             │
│ • UserSocialConnection (Like, Bookmark, Block, Contact)│
│ • Page (Nội dung trang tĩnh riêng)                     │
│ • MediaFile (Tệp upload thuộc dự án)                   │
│ • Post, Product (Nếu là dự án thương mại)              │
└────────────────────────────────────────────────────────┘
```

Mọi Model thuộc phạm vi Project đều kế thừa lớp trừu tượng `ProjectScopedModel`:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ProjectScopedModel extends Model
{
    protected $connection = 'project';
}
```

---

## 5. CƠ CHẾ CÔ LẬP CACHE, SESSION VÀ QUEUE

1. **Cache Partitioning:**
   * Tiền tố Cache bắt buộc phải gắn namespace `project_{id}`:
   ```php
   $cacheKey = "project:{$projectId}:settings:{$key}";
   ```
2. **Session Cookie Isolation:**
   * Khi người dùng truy cập theo tên miền riêng (`ehenho.vn`), cookie session tự động giới hạn phạm vi theo miền (`session.domain = .ehenho.vn`), ngăn chặn hoàn toàn việc đọc trộm hoặc ghi đè session của các website khác.
3. **Queue / Job Context:**
   * Mọi Job chạy ngầm liên quan đến Project phải truyền tham số `$projectId` trong payload của Job:
   ```php
   class ProcessMemberNotification implements ShouldQueue {
       public function __construct(public int $projectId, public int $memberId) {}
       public function handle(DatabaseResolver $dbResolver) {
           $project = Project::find($this->projectId);
           $dbResolver->connect($project);
           // Thực thi tác vụ an toàn trên DB của Project
       }
   }
   ```
