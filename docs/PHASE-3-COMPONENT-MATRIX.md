# MA TRẬN THÀNH PHẦN TÁI SỬ DỤNG – PHASE 3 (COMPONENT MATRIX)
## BẢN ĐẶC TẢ 10 BLADE COMPONENTS DÙNG CHUNG TRONG THEME E-HENHO

> **Nguyên tắc thiết kế:** Không nhúng mã giao diện lặp đi lặp lại giữa các trang. Mỗi khối UI có tính chất xuất hiện từ 2 trang trở lên đều được chuẩn hóa thành Blade component độc lập, nhận props/slots động.

---

### BẢNG TỔNG HỢP 10 REUSABLE COMPONENTS

| STT | Tên Component | Vị Trí Blade Đích | Tần Suất Xuất Hiện | Thuộc Tính Đầu Vào (Props / Slots) | Phụ Thuộc CSS / JS |
| :--: | :--- | :--- | :--: | :--- | :--- |
| 1 | `header-navbar` | `components/header.blade.php` | 22/22 trang | `logoUrl`, `unreadCount`, `currentUser` | `base8.css`, `auth-session.js` |
| 2 | `footer-main` | `components/footer.blade.php` | 22/22 trang | `siteName`, `supportEmail`, `socialLinks` | `base8.css`, FontAwesome |
| 3 | `account-sidebar` | `components/account-sidebar.blade.php` | 13/22 trang | `activeRoute`, `unreadInboxCount`, `completion` | `base8.css` |
| 4 | `profile-card` | `components/profile-card.blade.php` | 7/22 trang | `profile` (Model instance), `showActions` | `base8.css` |
| 5 | `search-filter` | `components/search-filter.blade.php` | 3/22 trang | `selectedGender`, `ageMin`, `ageMax`, `selectedProvince` | `drop_down.js`, `vietnam_provinces.json` |
| 6 | `hero-carousel` | `components/hero-carousel.blade.php` | 1/22 trang | `featuredProfiles`, `slides` | `carousel.css`, `bootstrap.js` |
| 7 | `message-row` | `components/message-row.blade.php` | 2/22 trang | `message` (Model instance), `type` ('inbox'/'sent') | `base8.css` |
| 8 | `password-toggle`| `components/password-toggle.blade.php` | 4/22 trang | `name`, `id`, `label`, `placeholder`, `required` | `base8.css`, inline jQuery mask |
| 9 | `pagination` | `components/pagination.blade.php` | 6/22 trang | `paginator` (LengthAwarePaginator) | Bootstrap 3.3.6 pagination |
| 10 | `modal-dialog` | `components/modal.blade.php` | 5/22 trang | `modalId`, `title`, `submitLabel`, `actionUrl` | Bootstrap 3.3.6 modal |

---

### ĐẶC TẢ CHI TIẾT CÁC COMPONENT TRỌNG TÂM

#### 1. Component Thẻ Thành Viên (`profile-card.blade.php`)
* **Mục đích:** Hiển thị thumbnail đại diện của một thành viên trong lưới tìm kiếm hoặc danh sách bạn bè kết nối.
* **Mẫu Blade:**
```blade
@props(['profile', 'showActions' => true])

<div class="col-md-3 col-sm-4 col-xs-6 profile-box-wrapper" id="profile-card-{{ $profile->id }}">
    <div class="thumbnail profile_box">
        <a href="{{ route('ehenho.profile.show', $profile->id) }}" class="avatar-link">
            <img src="{{ $profile->avatar_url ?: asset('themes/ehenho/images/default_avatar.png') }}" 
                 alt="{{ $profile->display_name }}" class="img-responsive c-img-avatar">
            @if($profile->is_online)
                <span class="online-badge" title="Đang online"></span>
            @endif
        </a>
        <div class="caption text-center">
            <h4 class="profile-name">
                <a href="{{ route('ehenho.profile.show', $profile->id) }}">{{ $profile->display_name }}</a>
            </h4>
            <p class="profile-meta text-muted">
                {{ $profile->age }} tuổi &bull; {{ $profile->province_name }}
            </p>
            @if($showActions)
                <div class="profile-actions">
                    <button class="btn btn-xs btn-primary btn-like" data-id="{{ $profile->id }}" title="Thích">
                        <i class="fa fa-heart"></i>
                    </button>
                    <a href="{{ route('ehenho.messages.compose', ['to' => $profile->user_id]) }}" class="btn btn-xs btn-default" title="Nhắn tin">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
```

#### 2. Component Sidebar Tài Khoản (`account-sidebar.blade.php`)
* **Mục đích:** Thanh điều hướng thống nhất bên trái cho toàn bộ 13 trang quản lý thành viên.
* **Mẫu Blade:**
```blade
<div class="list-group account-nav-menu">
    <a href="{{ route('ehenho.account.my_profile') }}" 
       class="list-group-item {{ request()->routeIs('*.my_profile') ? 'active' : '' }}">
        <i class="fa fa-user fa-fw"></i> Hồ sơ của tôi
    </a>
    <a href="{{ route('ehenho.account.profile_edit') }}" 
       class="list-group-item {{ request()->routeIs('*.profile_edit') ? 'active' : '' }}">
        <i class="fa fa-edit fa-fw"></i> Chỉnh sửa hồ sơ
    </a>
    <a href="{{ route('ehenho.account.avatar_upload') }}" 
       class="list-group-item {{ request()->routeIs('*.avatar_upload') ? 'active' : '' }}">
        <i class="fa fa-camera fa-fw"></i> Đổi ảnh đại diện
    </a>
    <a href="{{ route('ehenho.messages.inbox') }}" 
       class="list-group-item {{ request()->routeIs('*.messages.*') ? 'active' : '' }}">
        <i class="fa fa-envelope fa-fw"></i> Hộp thư
        @if(!empty($unreadInboxCount))
            <span class="badge badge-primary">{{ $unreadInboxCount }}</span>
        @endif
    </a>
    <a href="{{ route('ehenho.social.likes') }}" 
       class="list-group-item {{ request()->routeIs('*.social.*') ? 'active' : '' }}">
        <i class="fa fa-heart fa-fw"></i> Người đã thích & lưu
    </a>
    <a href="{{ route('ehenho.account.password') }}" 
       class="list-group-item {{ request()->routeIs('*.password') ? 'active' : '' }}">
        <i class="fa fa-key fa-fw"></i> Đổi mật khẩu
    </a>
    <a href="{{ route('ehenho.account.settings') }}" 
       class="list-group-item {{ request()->routeIs('*.settings') ? 'active' : '' }}">
        <i class="fa fa-cog fa-fw"></i> Thiết lập tài khoản
    </a>
</div>
```

#### 3. Component Form Tìm Kiếm Lọc Tỉnh/Tuổi (`search-filter.blade.php`)
* **Mục đích:** Tích hợp bộ chọn tỉnh thành Việt Nam nạp từ dataset JSON hành chính chuẩn.
* **Mẫu Blade:**
```blade
<div class="search-filter-card panel panel-default">
    <div class="panel-body">
        <form method="GET" action="{{ route('ehenho.search.index') }}" class="form-horizontal">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <label class="control-label">Tìm bạn:</label>
                    <select name="gender" class="form-control">
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Tìm Nữ</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Tìm Nam</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6">
                    <label class="control-label">Độ tuổi:</label>
                    <div class="form-inline">
                        <input type="number" name="age_min" value="{{ request('age_min', 18) }}" min="18" max="70" class="form-control" style="width: 45%;">
                        -
                        <input type="number" name="age_max" value="{{ request('age_max', 45) }}" min="18" max="70" class="form-control" style="width: 45%;">
                    </div>
                </div>
                <div class="col-md-4 col-sm-8">
                    <label class="control-label">Tỉnh / Thành phố:</label>
                    <select name="province" id="filter-province-select" class="form-control">
                        <option value="">-- Tất cả tỉnh thành --</option>
                        @foreach($provinces as $prov)
                            <option value="{{ $prov->id }}" {{ request('province') == $prov->id ? 'selected' : '' }}>
                                {{ $prov->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-sm-4 text-right" style="padding-top: 24px;">
                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fa fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
```
