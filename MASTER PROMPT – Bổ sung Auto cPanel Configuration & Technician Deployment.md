# PHASE 12A – AUTO CPANEL CONFIGURATION DISCOVERY

Hệ thống hiện tại đã có kết nối với cPanel.

Khi tạo một **Project/Site/Tenant mới**, Agent **KHÔNG được yêu cầu kỹ thuật viên tự nhập lại các thông số cPanel nếu hệ thống đã có thể lấy được từ connection hiện tại**.

Mục tiêu:

```text
Existing cPanel Connection
        ↓
Read cPanel Information
        ↓
Normalize Configuration
        ↓
Create Project Deployment Config
        ↓
Save to Project
        ↓
Display on Super Admin
        ↓
Technician follows instructions
        ↓
Add Project into domains
        ↓
Deploy
```

---

## 12A.1 – SOURCE OF TRUTH

Phải xác định rõ:

```text
CPANEL CONNECTION
        ↓
CPANEL ACCOUNT
        ↓
HOST INFORMATION
        ↓
DOMAIN INFORMATION
        ↓
DIRECTORY INFORMATION
        ↓
DEPLOYMENT CONFIGURATION
```

Các thông số lấy từ cPanel phải được xem là **source of truth** cho deployment.

Không được tự tạo thông số giả nếu cPanel đã trả về thông tin thực tế.

Nếu không lấy được thông số:

```text
NOT FOUND
```

Nếu lấy được nhưng chưa xác minh:

```text
UNCERTAIN
```

Không được tự đoán.

---

# PHASE 12B – AUTO DISCOVERY KHI CREATE PROJECT

Khi thực hiện:

```text
Create Project
```

hoặc:

```text
Create Site
```

phải thực hiện quy trình:

```text
Create Project
       ↓
Generate Project ID
       ↓
Create/Map Tenant
       ↓
Connect cPanel
       ↓
Inspect cPanel Account
       ↓
Inspect Existing Domains
       ↓
Inspect Document Roots
       ↓
Inspect Home Directory
       ↓
Inspect PHP Version
       ↓
Inspect SSL Status
       ↓
Inspect Database Capability
       ↓
Generate Deployment Configuration
       ↓
Save Configuration
       ↓
Display Configuration in Super Admin
```

---

# PHASE 12C – THÔNG SỐ PHẢI TỰ ĐỘNG LẤY

Khi cPanel connection hoạt động, phải cố gắng lấy các thông tin thực tế sau:

```text
cPanel Host
cPanel Account
Account Username
Home Directory
Public Directory
Domains
Subdomains
Document Roots
Domain Mapping
PHP Version
PHP Handler
MySQL Version
Database Capability
Database Prefix
SSL Status
SSL Certificate Status
DNS Information nếu API hỗ trợ
FTP Information nếu hệ thống đang hỗ trợ
SSH Information nếu hệ thống đang hỗ trợ
Cron Capability
Storage Path
Available Disk Space nếu API hỗ trợ
```

Không phải tất cả thông số đều bắt buộc phải có.

Agent phải phân loại:

```text
FOUND
NOT FOUND
NOT SUPPORTED
UNCERTAIN
```

---

# PHASE 12D – DOMAIN DISCOVERY

Khi tạo Project mới, phải kiểm tra danh sách Domain hiện có trên cPanel.

Ví dụ:

```text
domains/
    domain-a.com
    domain-b.com
    domain-c.com
```

Phải xác định:

```text
Domain Name
Domain Type
Document Root
SSL
Status
Existing Project Mapping
```

Không được tự ý sử dụng Domain đang thuộc Project khác.

Nếu Domain đã được mapping:

```text
PROJECT A
→ domain-a.com
```

thì không được:

```text
PROJECT B
→ domain-a.com
```

trừ khi có thao tác chuyển ownership/mapping rõ ràng.

---

# PHASE 12E – AUTO GENERATE DEPLOYMENT PATH

Khi tạo Project mới, hệ thống phải sinh:

```text
Project ID
Tenant ID
Deployment ID
Deployment Path
Document Root
Domain Mapping
```

Ví dụ:

```text
Project ID:
11

Tenant ID:
11

Deployment Path:

/home/ACCOUNT/domains/example.com/

Document Root:

/home/ACCOUNT/domains/example.com/public/
```

Các giá trị trên chỉ là ví dụ.

**Không được hard-code `/home/ACCOUNT/domains`**.

Phải lấy:

```text
Home Directory
```

và:

```text
Domain Document Root
```

thực tế từ cPanel hoặc cấu hình host hiện tại.

---

# PHASE 12F – PROJECT DEPLOYMENT CONFIG

Mỗi Project phải có một Deployment Configuration riêng.

Ví dụ:

```text
Project
ID: 11

Deployment Configuration

--------------------------------
CPANEL
--------------------------------

Connection:
CPANEL_PRIMARY

Account:
xxxx

Home:
xxxx

--------------------------------
DOMAIN
--------------------------------

Domain:
example.com

Document Root:
xxxx

--------------------------------
APPLICATION
--------------------------------

Project ID:
11

Tenant ID:
11

Deployment ID:
DEP-000011

--------------------------------
PHP
--------------------------------

PHP Version:
8.2

PHP Handler:
xxxx

--------------------------------
DATABASE
--------------------------------

Database:
xxxx

Database User:
xxxx

Database Host:
localhost

--------------------------------
STORAGE
--------------------------------

Storage Path:
xxxx

--------------------------------
SSL
--------------------------------

SSL:
ACTIVE

--------------------------------
STATUS
--------------------------------

Deployment Ready:
YES
```

Không được lưu password hoặc secret nhạy cảm vào UI dưới dạng plaintext.

---

# PHASE 12G – PROJECT CONFIG PAGE

Sau khi tạo Project, toàn bộ cấu hình deployment phải được hiển thị tại:

```text
https://aimagency.vn/superadmin/projects/{PROJECT_ID}/config
```

Ví dụ:

```text
https://aimagency.vn/superadmin/projects/11/config
```

Trang này phải trở thành:

# PROJECT DEPLOYMENT CONFIGURATION CENTER

Trang phải hiển thị rõ:

```text
PROJECT INFORMATION
TENANT INFORMATION
CPANEL INFORMATION
DOMAIN INFORMATION
DIRECTORY INFORMATION
PHP INFORMATION
DATABASE INFORMATION
STORAGE INFORMATION
SSL INFORMATION
DEPLOYMENT INFORMATION
TECHNICIAN INSTRUCTIONS
HEALTH CHECK
DEPLOYMENT HISTORY
```

---

# PHASE 12H – TECHNICIAN MODE

Mục tiêu quan trọng:

## Kỹ thuật viên không cần phải biết kiến trúc Multi-Tenancy nội bộ.

Họ chỉ cần mở:

```text
/superadmin/projects/{id}/config
```

và làm đúng hướng dẫn hệ thống tạo sẵn.

Trang Config phải có một khu vực:

# TECHNICIAN DEPLOYMENT GUIDE

Ví dụ:

```text
PROJECT:
Example Project

PROJECT ID:
11

TENANT ID:
11

DOMAIN:
example.com

DEPLOYMENT PATH:
/home/account/domains/example.com/

DOCUMENT ROOT:
/home/account/domains/example.com/public/
```

---

# PHASE 12I – AUTO GENERATE TECHNICIAN STEPS

Hệ thống phải tự sinh hướng dẫn dựa trên thông số thật.

Ví dụ:

```text
STEP 1
Login cPanel

STEP 2
Open Domains

STEP 3
Find:
example.com

STEP 4
Document Root:
xxxx

STEP 5
Upload source to:
xxxx

STEP 6
Verify:
public/index.php

STEP 7
Verify:
.env

STEP 8
Verify:
storage permission

STEP 9
Run deployment commands

STEP 10
Open:
https://example.com

STEP 11
Run Health Check
```

Không được sử dụng hướng dẫn chung chung.

Hướng dẫn phải được generate dựa trên:

```text
PROJECT CONFIG
+
CPANEL CONFIG
+
DOMAIN CONFIG
+
DEPLOYMENT CONFIG
```

---

# PHASE 12J – COPY BUTTONS

Trang:

```text
/superadmin/projects/{id}/config
```

phải hỗ trợ Copy nhanh cho kỹ thuật viên.

Ví dụ:

```text
[Copy Domain]

example.com
```

```text
[Copy Document Root]

/home/account/domains/example.com/public/
```

```text
[Copy Deployment Path]

/home/account/domains/example.com/
```

```text
[Copy SSH Command]
```

```text
[Copy Environment Template]
```

```text
[Copy Deployment Command]
```

Những thông tin nhạy cảm không được hiển thị trực tiếp.

---

# PHASE 12K – DOMAIN DEPLOYMENT STANDARD

Phải chuẩn hóa deployment theo:

```text
PROJECT
   ↓
TENANT
   ↓
DOMAIN
   ↓
DOMAIN ROOT
   ↓
PROJECT SOURCE
```

Ví dụ:

```text
Project 11
     ↓
Tenant 11
     ↓
example.com
     ↓
/home/account/domains/example.com/
     ↓
Laravel Application
```

Không được để nhiều Project cùng sử dụng một source directory nếu kiến trúc hiện tại không yêu cầu.

---

# PHASE 12L – DOMAIN CONFLICT CHECK

Trước khi cho phép deployment:

```text
Check Domain
Check Document Root
Check Existing Project
Check Existing Tenant
Check Existing Deployment
```

Nếu phát hiện:

```text
Domain already assigned
```

phải STOP deployment.

Không được tự ghi đè.

Ví dụ:

```text
ERROR

Domain:
example.com

Already assigned to:

Project:
8

Tenant:
8

Document Root:
xxxxx
```

Trạng thái:

```text
DEPLOYMENT BLOCKED
```

---

# PHASE 12M – AUTO DIRECTORY CHECK

Trước deployment phải kiểm tra:

```text
Home Directory
Domain Directory
Document Root
Project Directory
Storage Directory
Public Directory
```

Phải xác định rõ:

```text
EXISTS
NOT EXISTS
PERMISSION ERROR
WRITABLE
NOT WRITABLE
```

Không được tự động tạo/xóa directory nếu chưa có rule rõ ràng.

---

# PHASE 12N – DEPLOYMENT COMMAND GENERATOR

Hệ thống phải sinh command theo môi trường thực tế.

Ví dụ:

```bash
cd /home/account/domains/example.com
```

Sau đó:

```bash
php artisan migrate
php artisan storage:link
php artisan optimize
```

Nhưng:

**Không được hard-code command.**

Agent phải kiểm tra:

```text
PHP version
Laravel version
Server environment
Available binaries
Project structure
Deployment method
```

rồi mới generate command phù hợp.

Nếu không thể xác định command:

```text
COMMAND NOT VERIFIED
```

---

# PHASE 12O – HEALTH CHECK

Sau khi kỹ thuật viên deploy, trang Project Config phải có:

```text
HEALTH CHECK
```

Kiểm tra:

```text
Domain
HTTP Status
HTTPS
SSL
Laravel Boot
Database Connection
Storage
Asset
Tenant Resolution
Project ID
Tenant ID
```

Kết quả:

```text
PASS
FAIL
NOT TESTED
```

Ví dụ:

```text
DOMAIN                PASS
HTTPS                 PASS
SSL                   PASS
LARAVEL               PASS
DATABASE              PASS
STORAGE               PASS
TENANT RESOLUTION     PASS
PROJECT ID            PASS
TENANT ID             PASS
```

---

# PHASE 12P – DEPLOYMENT STATUS

Mỗi Project phải có trạng thái deployment:

```text
NOT_CONFIGURED
CONFIGURED
READY
DEPLOYING
DEPLOYED
HEALTH_CHECK_FAILED
DEPLOYMENT_FAILED
ROLLBACK_REQUIRED
ROLLED_BACK
```

Không được chỉ dùng:

```text
active / inactive
```

cho deployment status nếu cần phân biệt các trạng thái trên.

---

# PHASE 12Q – DEPLOYMENT SNAPSHOT

Khi Project được tạo, phải lưu một snapshot cấu hình deployment.

Ví dụ:

```text
Deployment Snapshot

Project ID:
11

Created:
xxxx

cPanel:
CPANEL_PRIMARY

Domain:
example.com

Document Root:
xxxx

PHP:
8.2

Database:
xxxx

Storage:
xxxx
```

Mục tiêu:

Nếu sau này cPanel thay đổi:

```text
Current Configuration
```

và:

```text
Deployment Snapshot
```

vẫn có thể được so sánh.

---

# PHASE 12R – CONFIG DRIFT DETECTION

Hệ thống phải có khả năng phát hiện:

```text
Saved Config
      VS
Current cPanel Config
```

Ví dụ:

```text
PHP

Saved:
8.2

Current:
8.3

Status:
CONFIG DRIFT
```

Hoặc:

```text
Document Root

Saved:
xxxx/site-a/public

Current:
xxxx/site-b/public

Status:
CRITICAL DRIFT
```

Không được tự động sửa production chỉ vì phát hiện drift.

Phải:

```text
DETECT
→ REPORT
→ REQUIRE ACTION
```

---

# PHASE 12S – DEPLOYMENT LOG

Mọi deployment phải ghi log:

```text
Deployment ID
Project ID
Tenant ID
Domain
Technician
Start Time
End Time
Source
Target Path
Commands
Result
Health Check
Rollback
Error
```

Ví dụ:

```text
DEP-000011

Project:
11

Tenant:
11

Domain:
example.com

Status:
DEPLOYED

Health Check:
PASS
```

---

# PHASE 12T – TECHNICIAN CHECKLIST

Trang Config phải có checklist:

```text
[ ] Verify cPanel account
[ ] Verify domain
[ ] Verify document root
[ ] Verify deployment path
[ ] Upload source
[ ] Configure environment
[ ] Configure database
[ ] Configure storage
[ ] Verify permission
[ ] Run Laravel setup
[ ] Verify domain
[ ] Verify HTTPS
[ ] Run health check
[ ] Mark deployment completed
```

Kỹ thuật viên chỉ cần thực hiện theo checklist.

---

# PHASE 12U – ONE PROJECT = ONE DEPLOYMENT MAP

Mỗi Project phải có một Deployment Map rõ ràng:

```text
Project 11
│
├── Tenant 11
│
├── Domain
│   └── example.com
│
├── cPanel
│   └── CPANEL_PRIMARY
│
├── Home Directory
│   └── xxxx
│
├── Deployment Path
│   └── xxxx
│
├── Document Root
│   └── xxxx/public
│
├── Database
│   └── xxxx
│
├── Storage
│   └── xxxx
│
└── Health Check
```

Mọi thành phần phải truy ngược được về:

```text
Project ID
Tenant ID
Deployment ID
```

---

# PHASE 12V – KHÔNG ĐƯỢC ĐỂ KỸ THUẬT VIÊN TỰ ĐOÁN

Đặc biệt không được yêu cầu kỹ thuật viên tự suy đoán:

```text
Domain
Document Root
Home Directory
Project Path
PHP Version
Database
Tenant ID
Project ID
```

Nếu thông tin đã được hệ thống lấy được thì phải hiển thị trực tiếp trên:

```text
/superadmin/projects/{id}/config
```

Mục tiêu cuối cùng:

```text
ADMIN CREATES PROJECT
        ↓
SYSTEM DISCOVERS CPANEL
        ↓
SYSTEM CREATES DEPLOYMENT CONFIG
        ↓
SYSTEM GENERATES TECHNICIAN GUIDE
        ↓
TECHNICIAN OPENS PROJECT CONFIG
        ↓
TECHNICIAN COPIES VERIFIED VALUES
        ↓
TECHNICIAN ADDS SOURCE TO DOMAINS
        ↓
DEPLOY
        ↓
HEALTH CHECK
        ↓
DEPLOYED
```

---

# PHASE 12W – ACCEPTANCE CRITERIA CHO CONFIG PAGE

Không coi chức năng này hoàn thành nếu chưa đạt:

```text
[ ] Project tự lấy được thông tin cPanel
[ ] Không nhập lại thông số đã có
[ ] Domain được xác định chính xác
[ ] Document Root được xác định chính xác
[ ] Deployment Path được xác định chính xác
[ ] Project ID chính xác
[ ] Tenant ID chính xác
[ ] Có Deployment ID
[ ] Có Technician Guide
[ ] Có Copy buttons
[ ] Có Domain Conflict Check
[ ] Có Directory Check
[ ] Có Health Check
[ ] Có Deployment Status
[ ] Có Deployment Log
[ ] Có Config Snapshot
[ ] Có Drift Detection
[ ] Không expose secrets
[ ] Không overwrite Project khác
[ ] Không overwrite Domain khác
[ ] Không tự ý xóa source hiện tại
```

---

# PHASE 12X – URL TRUNG TÂM CẤU HÌNH

Chuẩn hóa:

```text
https://aimagency.vn/superadmin/projects/{PROJECT_ID}/config
```

Ví dụ:

```text
https://aimagency.vn/superadmin/projects/11/config
```

Trang này phải được coi là:

```text
SINGLE SOURCE OF TRUTH
```

cho kỹ thuật viên deployment của Project đó.

Mọi thông tin quan trọng liên quan đến deployment phải truy xuất được từ Project Config.

Không tạo nhiều nơi chứa cùng một cấu hình dẫn đến sai lệch.

---

# PHASE 12Y – NGUYÊN TẮC CUỐI

Agent phải hiểu:

> Khi tạo một Project mới, mục tiêu không chỉ là tạo database record cho Project.

Mà phải tạo được một:

```text
DEPLOYMENT READY PROJECT
```

bao gồm:

```text
Project ID
+
Tenant ID
+
cPanel Mapping
+
Domain Mapping
+
Document Root
+
Deployment Path
+
Environment
+
Database
+
Storage
+
SSL
+
Technician Guide
+
Health Check
+
Deployment Log
```

Toàn bộ thông tin phải liên kết với:

```text
Project ID
```

và phải được hiển thị tại:

```text
/superadmin/projects/{id}/config
```

Kỹ thuật viên không được tự suy đoán.

Hệ thống phải **lấy → kiểm tra → chuẩn hóa → hiển thị → hướng dẫn**.

---

# PHASE 12Z – FLOW HOÀN CHỈNH

```text
CREATE PROJECT
      ↓
GENERATE PROJECT ID
      ↓
CREATE / MAP TENANT
      ↓
READ EXISTING CPANEL CONNECTION
      ↓
DISCOVER CPANEL ACCOUNT
      ↓
DISCOVER DOMAIN
      ↓
DISCOVER DOCUMENT ROOT
      ↓
DISCOVER HOST PATH
      ↓
DISCOVER PHP / DATABASE / SSL
      ↓
GENERATE DEPLOYMENT CONFIG
      ↓
SAVE CONFIG
      ↓
OPEN
/superadmin/projects/{id}/config
      ↓
GENERATE TECHNICIAN GUIDE
      ↓
TECHNICIAN ADDS SOURCE TO DOMAINS
      ↓
RUN DEPLOYMENT
      ↓
HEALTH CHECK
      ↓
SAVE DEPLOYMENT LOG
      ↓
DEPLOYED
```

---

# RULE

**Không tạo một cPanel connection mới cho từng Project nếu hệ thống hiện tại đã có một connection dùng chung và kiến trúc cho phép tái sử dụng.**

Thay vào đó:

```text
CPANEL CONNECTION
        ↓
PROJECT
        ↓
DOMAIN
        ↓
DEPLOYMENT CONFIG
```

Project chỉ giữ:

```text
connection_id
```

hoặc reference tương đương.

Không lưu credential nhạy cảm lặp lại trong từng Project.

---

# FINAL GOAL

Hệ thống phải đạt được trải nghiệm:

```text
Admin tạo Project 11
        ↓
System tự lấy thông tin cPanel
        ↓
System tự xác định Domain/Path
        ↓
System tự tạo Config
        ↓
Admin mở:

https://aimagency.vn/superadmin/projects/11/config

        ↓
Kỹ thuật viên nhìn thấy:
        ↓
Domain
Document Root
Deployment Path
PHP
Database
Storage
Commands
Checklist

        ↓
Copy
        ↓
Add source vào domains
        ↓
Deploy
        ↓
Health Check
        ↓
PASS
```

**Không để kỹ thuật viên phải tự tìm đường dẫn, tự nhớ Project ID, tự nhớ Tenant ID hoặc tự đoán Document Root.**