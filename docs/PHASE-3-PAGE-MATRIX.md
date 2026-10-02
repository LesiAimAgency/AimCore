# MA TRẬN 22 TRANG CHI TIẾT – PHASE 3 (PAGE MATRIX)
## BẢN ĐỒ ÁNH XẠ NGUYÊN BẢN TỪ 22 TỆP STATIC HTML SANG KIẾN TRÚC LARAVEL BLADE

> **Nguồn tĩnh:** `@public/e-henho`  
> **Chủ đề (Theme):** `ehenho`  
> **Thư mục Blade đích:** `resources/views/themes/ehenho/`  
> **Tổng số trang:** 22 HTML Pages

---

### BẢNG TỔNG HỢP ÁNH XẠ 22 TRANG

| STT | File Tĩnh | URL | Phân Loại | Template | Layout | Route Laravel | Controller / Action | Model Liên Quan | View Blade Đích |
| :--: | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | `index.html` | `/` | `homepage` | `theme-landing` | `layouts.frontend` | `GET /` | `HomeController@index` | `Profile, Post, Setting` | `themes.ehenho.pages.home` |
| 2 | `gioi-thieu.html` | `/gioi-thieu` | `static-content` | `page-content` | `layouts.frontend` | `GET /gioi-thieu` | `PageController@show` | `Page` | `themes.ehenho.pages.about` |
| 3 | `tim-ban-bon-phuong.html` | `/tim-ban-bon-phuong` | `search` | `search-directory` | `layouts.frontend` | `GET /tim-ban-bon-phuong` | `SearchController@index` | `Profile, Province` | `themes.ehenho.pages.search.index` |
| 4 | `tim-ban-bon-phuong-theo-tuoi.html` | `/tim-ban-theo-tuoi` | `search` | `search-directory` | `layouts.frontend` | `GET /tim-ban-theo-tuoi/{age?}` | `SearchController@byAge` | `Profile, Province` | `themes.ehenho.pages.search.by_age` |
| 5 | `profile-detail.html` | `/ho-so/{id}` | `profile` | `profile-detail` | `layouts.frontend` | `GET /ho-so/{id}` | `ProfileController@show` | `Profile, User, Media` | `themes.ehenho.pages.profile.detail` |
| 6 | `signup.html` | `/dang-ky` | `auth` | `auth-register` | `layouts.auth` | `GET /dang-ky` | `AuthController@showRegister` | `User, Profile` | `themes.ehenho.pages.auth.register` |
| 7 | `login.html` | `/dang-nhap` | `auth` | `auth-login` | `layouts.auth` | `GET /dang-nhap` | `AuthController@showLogin` | `User` | `themes.ehenho.pages.auth.login` |
| 8 | `logout.html` | `/dang-xuat` | `auth` | `auth-logout` | `layouts.auth` | `POST /dang-xuat` | `AuthController@logout` | `User` | `themes.ehenho.pages.auth.logout` |
| 9 | `password-reset.html` | `/quen-mat-khau` | `auth` | `auth-password-reset` | `layouts.auth` | `GET /quen-mat-khau` | `ForgotPasswordController@show` | `User` | `themes.ehenho.pages.auth.password_reset` |
| 10 | `password-change.html` | `/tai-khoan/doi-mat-khau` | `account` | `account-password-change` | `layouts.account` | `GET /tai-khoan/doi-mat-khau` | `AccountController@changePassword` | `User` | `themes.ehenho.pages.account.password` |
| 11 | `my-profile.html` | `/tai-khoan/ho-so` | `profile` | `profile-my-view` | `layouts.account` | `GET /tai-khoan/ho-so` | `ProfileController@myProfile` | `Profile, User` | `themes.ehenho.pages.account.my_profile` |
| 12 | `profile-edit.html` | `/tai-khoan/chinh-sua-ho-so` | `profile` | `profile-edit` | `layouts.account` | `GET /tai-khoan/chinh-sua-ho-so` | `ProfileController@edit` | `Profile, User` | `themes.ehenho.pages.account.profile_edit` |
| 13 | `profile-options.html` | `/tai-khoan/cai-dat` | `account` | `account-settings` | `layouts.account` | `GET /tai-khoan/cai-dat` | `AccountController@settings` | `UserSetting, User` | `themes.ehenho.pages.account.settings` |
| 14 | `upload-profile-pic.html` | `/tai-khoan/anh-dai-dien` | `profile` | `profile-avatar-upload` | `layouts.account` | `GET /tai-khoan/anh-dai-dien` | `ProfileController@avatarUpload` | `Profile, Media` | `themes.ehenho.pages.account.avatar_upload` |
| 15 | `inbox.html` | `/tin-nhan/hop-thu-den` | `messaging` | `messages-inbox` | `layouts.account` | `GET /tin-nhan/hop-thu-den` | `MessageController@inbox` | `Message, Conversation, User` | `themes.ehenho.pages.messages.inbox` |
| 16 | `sent.html` | `/tin-nhan/tin-da-gui` | `messaging` | `messages-sent` | `layouts.account` | `GET /tin-nhan/tin-da-gui` | `MessageController@sent` | `Message, Conversation, User` | `themes.ehenho.pages.messages.sent` |
| 17 | `message-view.html` | `/tin-nhan/{conversationId}` | `messaging` | `messages-thread-view` | `layouts.account` | `GET /tin-nhan/{conversationId}` | `MessageController@show` | `Message, Conversation, User` | `themes.ehenho.pages.messages.show` |
| 18 | `liked-profiles.html` | `/ket-noi/da-thich` | `social` | `social-profile-list` | `layouts.account` | `GET /ket-noi/da-thich` | `SocialController@likes` | `UserLike, Profile` | `themes.ehenho.pages.social.likes` |
| 19 | `bookmarked-profiles.html` | `/ket-noi/da-luu` | `social` | `social-profile-list` | `layouts.account` | `GET /ket-noi/da-luu` | `SocialController@bookmarks` | `UserBookmark, Profile` | `themes.ehenho.pages.social.bookmarks` |
| 20 | `blocked-profiles.html` | `/ket-noi/da-chan` | `social` | `social-profile-list` | `layouts.account` | `GET /ket-noi/da-chan` | `SocialController@blocked` | `UserBlock, Profile` | `themes.ehenho.pages.social.blocked` |
| 21 | `contactbook-profiles.html` | `/ket-noi/danh-ba` | `social` | `social-profile-list` | `layouts.account` | `GET /ket-noi/danh-ba` | `SocialController@contacts` | `UserContact, Profile` | `themes.ehenho.pages.social.contacts` |
| 22 | `email-manager.html` | `/tai-khoan/quan-ly-email` | `account` | `account-email-manager` | `layouts.account` | `GET /tai-khoan/quan-ly-email` | `AccountController@emails` | `UserEmail, User` | `themes.ehenho.pages.account.emails` |

---

### CHI TIẾT CÁC NHÓM NGHIỆP VỤ & RÀNG BUỘC GIAO DIỆN

#### 1. Nhóm Công Khai & Trang Chủ (`index.html`, `gioi-thieu.html`)
* **Thành phần giao diện:** Header với logo eHenho, Form tìm kiếm nhanh theo Tỉnh/Tuổi, Carousel thành viên nổi bật, Danh sách thành viên mới tham gia, Khối giới thiệu nền tảng 100% miễn phí, Footer liên kết điều khoản.
* **Tương tác:** jQuery carousel, toggle navbar mobile, dropdown tìm kiếm nhanh.
* **Dữ liệu động:** Danh sách thành viên mới (`Profile::latest()->take(12)->get()`), thành viên nổi bật (`Profile::where('is_featured', true)->take(8)->get()`), danh mục tỉnh thành (`Province::all()`).

#### 2. Nhóm Tìm Kiếm & Khám Phá (`tim-ban-bon-phuong.html`, `tim-ban-bon-phuong-theo-tuoi.html`)
* **Thành phần giao diện:** Form lọc tìm kiếm chi tiết nhiều tiêu chí (Giới tính, Khoảng tuổi min-max, Tỉnh/Thành phố nạp qua JSON hành chính), Lưới hiển thị thẻ hồ sơ (Profile Cards), Phân trang (Pagination controls).
* **Tương tác:** Script `drop_down.js` đồng bộ danh mục tỉnh/huyện từ `vietnam_provinces.json`, chuyển trang không làm mất trạng thái lọc.
* **Dữ liệu động:** Query tìm kiếm có phân trang (`Profile::filter($request)->paginate(16)`), tổng số kết quả tìm thấy.

#### 3. Nhóm Hồ Sơ Thành Viên (`profile-detail.html`, `my-profile.html`, `profile-edit.html`, `upload-profile-pic.html`)
* **Thành phần giao diện:** 
  * Chi tiết hồ sơ: Ảnh bìa, Avatar lớn, Trạng thái online, Nút nhắn tin / Kết bạn / Thích / Chặn, Bảng thông tin cá nhân (Nghề nghiệp, Tình trạng hôn nhân, Chiều cao, Học vấn, Giới thiệu bản thân, Tiêu chuẩn tìm kiếm).
  * Chỉnh sửa hồ sơ: Form nhập liệu phân tab/khối lớn với các trường select box chuẩn hóa.
  * Tải ảnh đại diện: Form upload ảnh (`multipart/form-data`) với khung preview và hướng dẫn quy chuẩn ảnh.
* **Tương tác:** Preview ảnh tức thì, validate dữ liệu đầu vào bằng `fc_sc_pe.js` và `1st_f_fc_pe.js`.

#### 4. Nhóm Hộp Thư & Nhắn Tin (`inbox.html`, `sent.html`, `message-view.html`)
* **Thành phần giao diện:** Bảng danh sách thư đến/thư đi có trạng thái đã đọc/chưa đọc (in đậm), Ngày giờ gửi, Nút chọn xóa nhiều, Giao diện luồng hội thoại (Message Thread View) kèm form gửi phản hồi nhanh.
* **Tương tác:** Chọn tất cả (Check all), Xóa thư đã chọn, Gửi tin nhắn qua form POST.
* **Dữ liệu động:** Danh sách hội thoại theo user đang đăng nhập (`Message::where(...)`), số tin nhắn chưa đọc trên Header.

#### 5. Nhóm Kết Nối & Mạng Xã Hội (`liked-profiles.html`, `bookmarked-profiles.html`, `blocked-profiles.html`, `contactbook-profiles.html`)
* **Điểm tương đồng kiến trúc:** 4 trang này sử dụng **chung một mẫu template danh sách thẻ hồ sơ (`social-profile-list`)** và layout tài khoản (`layouts.account`), chỉ khác nhau ở loại liên kết quan hệ (`relation_type`: `like`, `bookmark`, `block`, `contact`).
* **Hiệu quả tái sử dụng:** Tiết kiệm 75% khối lượng code bằng cách gom về 1 template Blade duy nhất với tham số động.

#### 6. Nhóm Xác Thực & Bảo Mật (`signup.html`, `login.html`, `logout.html`, `password-reset.html`, `password-change.html`)
* **Thành phần giao diện:** Form đăng ký phân bước, Form đăng nhập, Quên mật khẩu, Đổi mật khẩu.
* **Tương tác:** Widget ẩn/hiện mật khẩu `mask-pw` nguyên bản, kiểm tra email gợi ý typo `mailcheck.js`.
* **An toàn thông tin:** Chuyển đổi 100% token Django sang cơ chế Laravel CSRF (`@csrf`), băm mật khẩu qua Bcrypt.
