# MASTER PROMPT
## Laravel Multi-Tenancy Architecture Audit → URL Standardization → Host/cPanel Deployment

Bạn đang làm việc trên một dự án Laravel hiện tại có kiến trúc **Multi-Tenancy**.

### MỤC TIÊU TỔNG THỂ

Không được bắt đầu bằng việc sửa code ngay.

Nhiệm vụ của bạn là:

1. Quét toàn bộ source hiện tại.
2. Hiểu chính xác kiến trúc Multi-Tenancy đang được triển khai.
3. Kiểm tra cách tạo Site/Tenant hiện tại.
4. Kiểm tra Tenant ID và toàn bộ cơ chế mapping URL → Tenant.
5. Xác định dự án hiện tại đã thực sự đúng Multi-Tenancy hay chỉ mới có một phần.
6. Kiểm tra toàn bộ route, middleware, controller, model, database, config, session, cache và storage liên quan đến Tenant.
7. Xây dựng quy chuẩn URL thống nhất cho toàn hệ thống.
8. Kiểm tra cơ chế khi tạo một Site mới.
9. Kiểm tra khả năng deploy từng Site/Tenant lên Host/cPanel.
10. Vì hệ thống đã có kết nối cPanel, phải kiểm tra và lập kế hoạch sử dụng kết nối đó.
11. Không được code hoặc thay đổi kiến trúc trước khi hoàn thành bước PLAN/AUDIT.
12. Sau khi hoàn thành phải test lại toàn bộ flow Multi-Tenancy.
13. Cuối cùng mới thực hiện deployment lên Host theo mô hình phân vùng Site/Tenant.

---

# PHASE 0 – BẮT BUỘC: PLAN TRƯỚC KHI CODE

Trước khi thay đổi bất kỳ file nào, hãy tạo một bản PLAN.

PLAN phải trả lời được:

- Kiến trúc Multi-Tenancy hiện tại là gì?
- Tenant được lưu ở đâu?
- Site được lưu ở đâu?
- Tenant ID được sinh như thế nào?
- Site ID được sinh như thế nào?
- URL hiện tại xác định Tenant bằng cách nào?
- Domain/subdomain/path xác định Tenant bằng cách nào?
- Middleware nào chịu trách nhiệm resolve Tenant?
- Database có dùng chung hay tách database?
- Storage có dùng chung hay tách storage?
- Cache có bị dùng chung giữa các Tenant không?
- Session có bị dùng chung giữa các Tenant không?
- Queue/Job có xác định Tenant không?
- Config có phụ thuộc Tenant không?
- Admin/Super Admin có thể quản lý nhiều Tenant không?
- Một Tenant có thể có nhiều domain/site không?
- Khi tạo Site mới, hệ thống tạo những dữ liệu gì?
- Khi deploy Site mới lên cPanel, source nằm ở đâu?
- Public document root nằm ở đâu?
- Có cần tạo folder riêng cho từng Site không?
- Có cần tạo database riêng không?
- Có cần tạo domain/subdomain riêng không?

Không được tự suy đoán.

Nếu chưa tìm thấy cơ chế nào, ghi rõ:

`NOT FOUND`

Nếu phát hiện cơ chế nhưng chưa chắc chắn:

`UNCERTAIN`

Không được tự tạo logic thay thế chỉ để làm cho hệ thống "có vẻ đúng".

---

# PHASE 1 – FULL SOURCE AUDIT

Quét toàn bộ project.

Phải kiểm tra tối thiểu:

```text
/app
/bootstrap
/config
/database
/public
/resources
/routes
/storage
/tests
```

Ngoài ra phải kiểm tra:

```text
.env
composer.json
package.json
vite.config.*
phpunit.xml
artisan
server configuration
deployment configuration
```

Nếu project có thêm:

```text
modules/
packages/
plugins/
domains/
tenants/
sites/
```

thì cũng phải quét.

Không được chỉ quét `/app`.

---

# PHASE 2 – AUDIT MULTI-TENANCY

Xác định chính xác hệ thống đang dùng mô hình nào:

### Option A

```text
Central Application
        ↓
Tenant
        ↓
Shared Database
        ↓
tenant_id
```

### Option B

```text
Central Application
        ↓
Tenant
        ↓
Separate Database
```

### Option C

```text
Central Application
        ↓
Tenant
        ↓
Separate Database + Separate Storage
```

### Option D

Custom architecture.

Nếu là Custom Architecture, mô tả chính xác.

---

# PHASE 3 – TENANT / SITE ID

Đây là phần CỰC KỲ QUAN TRỌNG.

Dự án hiện tại khi tạo Site đã sử dụng **ID**.

Phải kiểm tra toàn bộ flow:

```text
Create Site
    ↓
Generate ID
    ↓
Save Tenant/Site
    ↓
Generate URL
    ↓
Resolve Tenant
    ↓
Load Tenant Data
    ↓
Render Site
```

Kiểm tra:

- ID được tạo ở đâu?
- Primary key là gì?
- UUID hay integer?
- Có slug không?
- Có code riêng cho Site không?
- URL có sử dụng ID không?
- ID có bị expose trực tiếp không?
- Có mapping giữa `site_id` và `tenant_id` không?
- Có bảng trung gian không?
- Có trường hợp Site ID và Tenant ID bị nhầm lẫn không?

### KHÔNG ĐƯỢC tự thay đổi ID hiện tại.

Nếu kiến trúc hiện tại đang dùng ID đúng thì phải giữ nguyên.

Nếu phát hiện vấn đề, báo cáo trước.

---

# PHASE 4 – URL STANDARD

Thiết kế một quy chuẩn URL thống nhất cho Multi-Tenancy.

Phải phân biệt rõ:

## Central/System URL

Ví dụ:

```text
/admin
/admin/sites
/admin/tenants
/admin/users
```

## Tenant URL

Ví dụ có thể là:

```text
/{tenant}
```

hoặc:

```text
/sites/{site}
```

hoặc:

```text
{tenant-domain}
```

hoặc:

```text
{subdomain}.domain.com
```

Không được tự chọn.

Trước tiên phải phân tích cấu trúc hiện tại.

Sau đó đề xuất URL STANDARD phù hợp với architecture hiện tại.

### Quy tắc bắt buộc

Một URL phải xác định được:

```text
Request
   ↓
Tenant Resolver
   ↓
Tenant ID
   ↓
Tenant Context
   ↓
Application
```

Không được để Controller tự đoán Tenant.

Không được lấy Tenant bằng những logic rải rác như:

```php
request()->segment(...)
```

ở nhiều Controller khác nhau.

Phải có một cơ chế Tenant Resolution trung tâm.

---

# PHASE 5 – TENANT RESOLUTION

Xác định và kiểm tra:

```text
HTTP Request
     ↓
URL / Domain
     ↓
Tenant Resolver
     ↓
Tenant ID
     ↓
Tenant Context
     ↓
Middleware
     ↓
Controller
     ↓
Model
```

Kiểm tra các trường hợp:

### Case 1

Tenant tồn tại.

→ Request phải vào đúng Tenant.

### Case 2

Tenant không tồn tại.

→ Không được fallback sang Tenant khác.

### Case 3

Tenant ID không hợp lệ.

→ Trả về 404 hoặc response chuẩn.

### Case 4

User đăng nhập Tenant A nhưng cố truy cập Tenant B.

→ Không được truy cập dữ liệu Tenant B nếu không có quyền.

### Case 5

Admin hệ thống.

→ Có quyền quản lý nhiều Tenant theo permission.

### Case 6

Public Site.

→ Chỉ load dữ liệu của Tenant tương ứng.

---

# PHASE 6 – DATABASE ISOLATION

Quét toàn bộ Models và Queries.

Tìm các vấn đề:

```php
Model::all()
Model::find()
Model::where(...)
DB::table(...)
```

Kiểm tra xem dữ liệu Tenant có bị query xuyên Tenant hay không.

Ví dụ nguy hiểm:

```php
Product::find($id);
```

Trong Multi-Tenancy phải kiểm tra Tenant context.

Không được chỉ dựa vào:

```text
product_id
```

nếu ID có thể tồn tại hoặc được truy cập từ Tenant khác.

Phải xác định rõ:

```text
tenant_id
+
resource_id
```

hoặc cơ chế isolation tương đương.

---

# PHASE 7 – ROUTE AUDIT

Quét:

```text
routes/web.php
routes/api.php
routes/admin.php
routes/*.php
```

Kiểm tra:

- Route nào là Central?
- Route nào là Tenant?
- Route nào là Public?
- Route nào cần Tenant Middleware?
- Route nào không được Tenant Middleware?
- Có route conflict không?
- Có route lấy Tenant trực tiếp từ request không?
- Có route hard-code Site ID không?

Tạo Route Map:

```text
METHOD
URL
NAME
MIDDLEWARE
CONTROLLER
TENANT REQUIRED
PURPOSE
```

---

# PHASE 8 – MIDDLEWARE AUDIT

Tìm toàn bộ Middleware liên quan:

```text
Tenant
Site
Domain
Admin
Auth
Permission
Role
Session
```

Xác định middleware execution order.

Ví dụ:

```text
Request
 ↓
Detect Domain
 ↓
Resolve Tenant
 ↓
Set Tenant Context
 ↓
Auth
 ↓
Permission
 ↓
Controller
```

Phải đảm bảo Tenant Context được xác định trước khi query dữ liệu Tenant.

---

# PHASE 9 – CACHE / SESSION / QUEUE

Đây là phần thường bị bỏ sót.

Kiểm tra:

### Cache

Không được để:

```text
tenant A cache
```

ghi đè:

```text
tenant B cache
```

Cache key phải có Tenant scope nếu cần.

Ví dụ:

```text
tenant:{tenant_id}:products
```

### Session

Kiểm tra session có bị dùng chung giữa các Tenant không.

### Queue

Kiểm tra Job có lưu:

```text
tenant_id
```

hoặc Tenant Context cần thiết hay không.

Một Job chạy background không được mất Tenant Context.

---

# PHASE 10 – STORAGE

Kiểm tra:

```text
storage/app
storage/app/public
public/storage
```

Xác định cách lưu file.

Đề xuất chuẩn:

```text
storage/
    tenants/
        {tenant_id}/
            media/
            documents/
            exports/
            cache/
```

Không được thay đổi ngay nếu project đang có cấu trúc khác.

Phải audit trước.

---

# PHASE 11 – SITE CREATION FLOW

Quét toàn bộ chức năng:

```text
Create Site
Edit Site
Delete Site
Clone Site
Activate Site
Deactivate Site
Deploy Site
```

Đặc biệt:

## Khi Create Site

Phải xác định:

```text
Site ID
Tenant ID
Site Name
Slug
Domain
Status
Database
Storage
Config
Theme
Settings
```

Cái nào hiện tại đã có thì giữ.

Cái nào thiếu thì đưa vào báo cáo.

Không tự sinh dữ liệu hoặc migration trước khi có PLAN.

---

# PHASE 12 – CPANEL / HOST DEPLOYMENT

Hệ thống hiện tại đã có kết nối với **cPanel**.

Không được bỏ qua connection này.

Phải audit:

```text
cPanel API / Connection
Authentication
Domain management
Subdomain management
Directory management
Database management
FTP/SFTP nếu có
SSL nếu có
Document Root
Cron
PHP version
Environment
```

Xác định khả năng tự động hóa:

```text
Create Site
      ↓
Create Tenant
      ↓
Create Directory
      ↓
Create Domain/Subdomain
      ↓
Create Database nếu cần
      ↓
Deploy Source
      ↓
Configure .env
      ↓
Run Migration
      ↓
Run Storage Link
      ↓
Cache Config
      ↓
Health Check
```

---

# PHASE 13 – HOST DIRECTORY STANDARD

Mục tiêu là mỗi Site/Tenant khi deploy sẽ có một phân vùng/thư mục riêng trên Host.

Ví dụ:

```text
/home/account/
│
├── central/
│
├── tenants/
│   ├── tenant-1001/
│   │   ├── current/
│   │   ├── storage/
│   │   └── releases/
│   │
│   ├── tenant-1002/
│   │   ├── current/
│   │   ├── storage/
│   │   └── releases/
│
└── domains/
```

Đây chỉ là ví dụ.

Không được áp dụng trực tiếp.

Phải kiểm tra cấu trúc cPanel/Host hiện tại trước.

Mục tiêu:

```text
Tenant A
→ Folder A

Tenant B
→ Folder B

Tenant C
→ Folder C
```

Không được để source của Tenant A và Tenant B ghi đè lẫn nhau.

---

# PHASE 14 – DEPLOYMENT ARCHITECTURE

Thiết kế flow:

```text
CENTRAL SYSTEM
      │
      ├── Tenant A
      │
      ├── Tenant B
      │
      └── Tenant C
              │
              ▼
          cPanel API
              │
              ▼
          Host Server
              │
      ┌───────┼────────┐
      ▼       ▼        ▼
   Site A   Site B   Site C
```

Mỗi Site phải có:

```text
Unique Tenant ID
Unique Deployment Path
Unique Domain/URL
Unique Environment
Unique Storage Scope
```

Nếu database dùng chung thì không tạo database riêng một cách vô lý.

Nếu database tách riêng thì phải xác định rõ.

---

# PHASE 15 – DEPLOYMENT SAFETY

Không được deploy trực tiếp lên production ngay.

Phải có:

```text
PLAN
 ↓
DRY RUN
 ↓
TEST
 ↓
STAGING
 ↓
HEALTH CHECK
 ↓
PRODUCTION
```

Trước khi deploy phải backup.

Không được:

```text
delete existing source
```

nếu chưa backup.

Không được:

```text
overwrite production
```

nếu chưa xác định chính xác Tenant/Path.

---

# PHASE 16 – TEST MULTI-TENANCY

Bắt buộc tạo test matrix.

## Test 1

```text
Tenant A → URL A → Data A
```

PASS/FAIL

## Test 2

```text
Tenant B → URL B → Data B
```

PASS/FAIL

## Test 3

```text
Tenant A → cố truy cập Data B
```

Expected:

```text
DENIED
```

## Test 4

```text
Tenant B → cố truy cập Data A
```

Expected:

```text
DENIED
```

## Test 5

```text
Invalid Tenant
```

Expected:

```text
404
```

## Test 6

```text
Admin → Tenant A
Admin → Tenant B
```

Expected:

```text
Allowed according to permission
```

## Test 7

Cache isolation.

## Test 8

Session isolation.

## Test 9

Queue/Job Tenant isolation.

## Test 10

File/Storage isolation.

## Test 11

Site creation.

## Test 12

Site deployment.

## Test 13

Deployment rollback.

---

# PHASE 17 – KHÔNG ĐƯỢC PHÁ DỮ LIỆU

Các dữ liệu hiện tại phải được bảo toàn.

Không được:

```text
DROP DATABASE
TRUNCATE
DELETE DATA
RESET PRODUCTION
```

trừ khi được yêu cầu rõ ràng.

Nếu migration cần thay đổi:

```text
ADD
ALTER
BACKFILL
MIGRATE
```

phải có kế hoạch trước.

Không được xóa dữ liệu chỉ vì schema hiện tại "không đẹp".

---

# PHASE 18 – CODE CHANGE POLICY

Chỉ được sửa code sau khi hoàn thành:

```text
SOURCE AUDIT
+
DATABASE AUDIT
+
TENANT AUDIT
+
URL AUDIT
+
ROUTE AUDIT
+
DEPLOYMENT AUDIT
+
PLAN
```

Mọi thay đổi phải trả lời:

```text
WHY?
WHAT?
WHERE?
IMPACT?
ROLLBACK?
TEST?
```

---

# PHASE 19 – FINAL REPORT

Sau khi audit phải xuất báo cáo:

## 1. Architecture

```text
Current Architecture
```

## 2. Multi-Tenancy Status

```text
PASS
PARTIAL
FAIL
```

## 3. Tenant Resolution

```text
Current mechanism
Problems
Recommendation
```

## 4. URL Standard

```text
Current URL
Recommended URL
Migration impact
```

## 5. Database

```text
Isolation
tenant_id
Indexes
Relations
Problems
```

## 6. Route

```text
Central Routes
Tenant Routes
Public Routes
Admin Routes
```

## 7. Security

```text
Cross Tenant Access
Auth
Permission
Session
Cache
Storage
```

## 8. Site Creation

```text
Current Flow
Missing Components
Problems
```

## 9. cPanel

```text
Current Connection
Available API
Deployment capability
```

## 10. Host Structure

```text
Current Structure
Recommended Structure
```

## 11. Deployment

```text
Current Deployment
Recommended Deployment
Rollback Strategy
```

## 12. Test

```text
Test Cases
PASS
FAIL
NOT TESTED
```

---

# PHASE 20 – ACCEPTANCE CRITERIA

Không được coi dự án hoàn thành nếu chưa đạt:

### Multi-Tenancy

```text
[ ] Tenant được resolve chính xác
[ ] Tenant ID nhất quán
[ ] URL xác định đúng Tenant
[ ] Không cross-tenant data
[ ] Không cross-tenant session
[ ] Không cross-tenant cache
[ ] Không cross-tenant storage
[ ] Queue giữ đúng Tenant Context
```

### Site

```text
[ ] Create Site hoạt động
[ ] Site ID chính xác
[ ] Tenant mapping chính xác
[ ] URL chính xác
[ ] Config chính xác
[ ] Storage chính xác
```

### cPanel

```text
[ ] Connection hoạt động
[ ] Có thể tạo directory
[ ] Có thể deploy source
[ ] Domain mapping chính xác
[ ] Environment chính xác
[ ] Permission chính xác
[ ] Health check PASS
```

### Deployment

```text
[ ] Tenant A độc lập Tenant B
[ ] Không overwrite nhầm source
[ ] Có backup
[ ] Có rollback
[ ] Có deployment log
```

---

# QUY TẮC QUAN TRỌNG NHẤT

## 1.

**PLAN FIRST, CODE SECOND.**

## 2.

Không được đoán architecture.

## 3.

Không được tự ý thay đổi Tenant ID hiện tại.

## 4.

Không được tự ý đổi URL trước khi audit toàn bộ route và tenant resolver.

## 5.

Không được coi project là Multi-Tenancy chỉ vì có bảng `tenants`.

Phải chứng minh bằng flow thực tế:

```text
URL
 ↓
Tenant Resolver
 ↓
Tenant Context
 ↓
Middleware
 ↓
Database
 ↓
Storage
 ↓
Cache
 ↓
Session
 ↓
Queue
```

## 6.

Mọi dữ liệu hiện tại phải được bảo toàn.

## 7.

Mọi thay đổi kiến trúc phải có lý do và impact analysis.

## 8.

cPanel connection hiện tại phải được tận dụng nếu phù hợp, không được tạo một cơ chế deployment khác chỉ vì tiện code hơn.

## 9.

Trước khi production deployment phải có:

```text
Backup
+
Dry Run
+
Test
+
Health Check
+
Rollback Plan
```

## 10.

Nếu phát hiện architecture hiện tại chưa đúng Multi-Tenancy:

**KHÔNG được tự động rewrite toàn bộ project.**

Hãy:

```text
AUDIT
→
REPORT
→
PROPOSE ARCHITECTURE
→
WAIT/APPROVAL
→
IMPLEMENT
→
TEST
→
DEPLOY
```

---

# OUTPUT BẮT BUỘC CỦA AGENT

Trước khi code, trả về:

```text
========================================
MULTI-TENANCY AUDIT
========================================

1. Current Architecture:
2. Tenant Model:
3. Site Model:
4. Tenant ID:
5. Site ID:
6. Tenant Resolution:
7. Current URL Structure:
8. Proposed URL Structure:
9. Route Architecture:
10. Middleware:
11. Database Isolation:
12. Storage Isolation:
13. Cache Isolation:
14. Session Isolation:
15. Queue Isolation:
16. Site Creation Flow:
17. cPanel Connection:
18. Current Host Structure:
19. Proposed Host Structure:
20. Deployment Flow:
21. Security Risks:
22. Data Risks:
23. Required Changes:
24. Files To Change:
25. Database Changes:
26. Deployment Changes:
27. Test Plan:
28. Rollback Plan:

========================================
STATUS
========================================

MULTI-TENANCY:
[PASS / PARTIAL / FAIL]

URL STANDARD:
[PASS / PARTIAL / FAIL]

TENANT ISOLATION:
[PASS / PARTIAL / FAIL]

CPANEL DEPLOYMENT:
[PASS / PARTIAL / FAIL]

PRODUCTION READY:
[YES / NO]

========================================
NEXT ACTION
========================================

DO NOT CODE YET.

Chỉ bắt đầu code sau khi PLAN và AUDIT đã hoàn tất.

### Điểm tôi cố tình nhấn mạnh

Phần quan trọng nhất trong case của bạn là **không để Agent hiểu "Multi-Tenancy = có `tenant_id`"**. Nó phải audit thành một chuỗi hoàn chỉnh:

**URL → Resolve Tenant → Tenant Context → Middleware → Query → Cache → Session → Storage → Queue → Deploy.**

Và với cPanel, tôi cũng sẽ tách rõ **Central App** và **các Site/Tenant được deploy**, để sau này bạn có thể tạo Site mới theo kiểu:

`Create Site → cấp ID → tạo cấu trúc → map URL/domain → deploy vào phân vùng riêng → health check`

chứ không phải copy source thủ công rồi cầu nguyện server không bốc khói. 😄