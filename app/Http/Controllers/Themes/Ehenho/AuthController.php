<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use App\Models\Project;
use App\Models\User;
use App\Services\CaptchaService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private const MARITAL_STATUS_MAP = [
        'single' => 'Độc thân',
        'divorced' => 'Ly dị',
        'widowed' => 'Ở góa',
        'in-relationship' => 'Đang có người yêu',
    ];

    private const LOOK_FOR_MAP = [
        'marriage' => 'Tìm người để kết hôn',
        'long-term-love' => 'Tìm người yêu lâu dài',
        'short-term-love' => 'Tìm người yêu ngắn hạn',
        'chat-or-intimate-friends' => 'Tìm bạn tâm sự',
        'new-friends' => 'Tìm bạn bè mới',
        'life-mate' => 'Tìm bạn đời',
    ];

    private const EDUCATION_MAP = [
        'GRA' => 'Phổ thông',
        'VCA' => 'Trung cấp',
        'ASO' => 'Cao đẳng',
        'BAC' => 'Đại học',
        'MAS' => 'Cao học',
        'AMA' => 'Trên cao học',
    ];

    private const APPEARANCE_MAP = [
        '1' => 'Cân đối',
        '2' => 'Cao lớn',
        '3' => 'Mảnh mai',
        '4' => 'Mũm mỉm',
        '5' => 'Nhỏ nhắn',
        '6' => 'Tầm thước',
        '7' => 'Thấp đậm',
        '8' => 'Vạm vỡ',
    ];

    private const INTEREST_MAP = [
        '1' => 'Ẩm thực (tín đồ ẩm thực)',
        '2' => 'Chăm sóc gia đình',
        '3' => 'Chơi môn thể thao ngoài trời (đá bóng, tennis, chạy bộ...)',
        '4' => 'Chơi môn thể thao trong nhà (aerobic, bóng bàn, thể dục...)',
        '5' => 'Công nghệ (hi-tech)',
        '6' => 'Công việc & sự nghiệp',
        '7' => 'Dã ngoại (picnic)',
        '8' => 'Đọc sách nhiều',
        '9' => 'Du lịch',
        '10' => 'Gym',
        '11' => 'Hoạt động từ thiện, thiện nguyện',
        '12' => 'Học hành & phát triển bản thân',
        '13' => 'Nấu ăn',
        '14' => 'Nghệ thuật',
        '15' => 'Nữ công gia chánh',
        '16' => 'Nuôi thú cưng',
        '17' => 'Phượt',
        '18' => 'Thích nơi yên tĩnh',
        '19' => 'Thích tụ tập bạn bè',
        '20' => 'Thiên nhiên cây cỏ',
        '21' => 'Thiền',
        '22' => 'Thời trang (tín đồ thời trang)',
        '23' => 'Văn học',
        '24' => 'Văn nghệ',
        '25' => 'Xem phim nhiều',
        '26' => 'Yoga',
        '27' => 'Sở thích khác',
    ];

    private const PERSONALITY_MAP = [
        '1' => 'Chân thành',
        '2' => 'Chung thủy',
        '3' => 'Dễ gần',
        '4' => 'Dịu dàng',
        '5' => 'Điềm đạm',
        '6' => 'Đơn giản',
        '7' => 'Hiền',
        '8' => 'Khéo léo',
        '9' => 'Khó đoán',
        '10' => 'Kín đáo',
        '11' => 'Lạnh lùng',
        '12' => 'Mạnh mẽ',
        '13' => 'Mơ mộng',
        '14' => 'Ngọt ngào',
        '15' => 'Nhân hậu',
        '16' => 'Phức tạp',
        '17' => 'Rụt rè',
        '18' => 'Sôi nổi',
        '19' => 'Tham vọng',
        '20' => 'Thật thà',
        '21' => 'Thực tế',
        '22' => 'Trầm tính',
        '23' => 'Vui vẻ',
    ];

    private const WAY_OF_LIFE_MAP = [
        '1' => 'An nhàn',
        '2' => 'Bình dân',
        '3' => 'Chan hòa tình yêu thương',
        '4' => 'Chơi thể thao thường xuyên',
        '5' => 'Có đạo',
        '8' => 'Đa văn hóa',
        '9' => 'Đi công tác xa thường xuyên',
        '10' => 'Đi du lịch thường xuyên',
        '11' => 'Điều độ/ Mực thước',
        '12' => 'Độc lập/ Không phụ thuộc vào ai',
        '13' => 'Gần gũi chan hòa với thiên nhiên',
        '14' => 'Giản dị',
        '17' => 'Há miệng chờ sung rụng',
        '19' => 'Hai lúa',
        '20' => 'Hay phiêu lưu mạo hiểm',
        '21' => 'Hiện đại',
        '22' => 'Khép kín',
        '24' => 'Không cố định nghề nghiệp',
        '25' => 'Không theo khuôn khổ',
        '26' => 'Lạc quan yêu đời',
        '27' => 'Làm việc đầu tắt mặt tối',
        '28' => 'Lãng mạn thi vị',
        '29' => 'Lành mạnh',
        '30' => 'Lập dị',
        '32' => 'Luôn nỗ lực vươn lên',
        '34' => 'Năng động',
        '36' => 'Người ăn thuần chay/ Ăn chay trường',
        '39' => 'Phức tạp',
        '40' => 'Quẩn quanh trong nhà',
        '43' => 'Sống có khát vọng & hoài bão',
        '44' => 'Sống lý trí',
        '46' => 'Sống tình cảm',
        '47' => 'Sống tự do/ Muốn làm gì thì làm',
        '48' => 'Sống về đêm',
        '53' => 'Thụ hưởng những gì đang có/ Hưởng thụ',
        '54' => 'Thực tế',
        '58' => 'Trí thức',
        '60' => 'Truyền thống',
        '61' => 'Tự lập/ Tự thân',
    ];

    private const MOST_VALUED_MAP = [
        '2' => 'Bạn đời',
        '3' => 'Bản thân mình',
        '4' => 'Cha mẹ',
        '5' => 'Con cái',
        '35' => 'Công danh & sự nghiệp',
        '6' => 'Của cải vật chất',
        '7' => 'Danh dự & uy tín',
        '8' => 'Danh vọng & địa vị',
        '9' => 'Đạo đức',
        '11' => 'Đức hạnh',
        '12' => 'Gia đình',
        '13' => 'Gia đình & người thân',
        '14' => 'Hạnh phúc',
        '17' => 'Lao động chân chính',
        '18' => 'Lẽ sống',
        '19' => 'Lòng chung thủy',
        '20' => 'Lòng nhân hậu',
        '28' => 'Người yêu',
        '29' => 'Niềm tin & ý chí',
        '30' => 'Niềm vui mỗi ngày',
        '34' => 'Sự bình yên',
        '37' => 'Sức khỏe',
        '40' => 'Thời gian',
        '43' => 'Tình cảm & tình yêu',
        '45' => 'Tình yêu thương',
        '46' => 'Trải nghiệm sống',
        '47' => 'Tri kỷ/ Bạn tâm giao',
    ];

    private const OCCUPATION_MAP = [
        '1' => 'Buôn bán-thương mại',
        '2' => 'Chủ doanh nghiệp',
        '3' => 'Công nhân (kỹ thuật, giản đơn...)',
        '4' => 'Công nhân viên chức',
        '5' => 'Dạy học (giáo viên, giảng viên...)',
        '6' => 'Du lịch-nhà hàng-khách sạn',
        '7' => 'IT (lập trình, mạng, đồ họa...)',
        '8' => 'Kế toán',
        '9' => 'Kỹ sư',
        '10' => 'Làm đẹp (làm tóc, nail, spa...)',
        '11' => 'Lao động tự do',
        '12' => 'Marketing-bán hàng',
        '13' => 'May mặc-sản xuất hàng thời trang',
        '14' => 'Môi giới (bất động sản, bảo hiểm...)',
        '15' => 'Mỹ thuật-kiến trúc',
        '16' => 'Nghệ sĩ',
        '17' => 'Nhân viên văn phòng',
        '18' => 'Nội trợ',
        '19' => 'Sinh viên',
        '20' => 'Tài chính-ngân hàng',
        '21' => 'Thiết kế-tạo mẫu',
        '22' => 'Vận chuyển (lái xe, shipper...)',
        '23' => 'Vận động viên',
        '24' => 'Xây dựng',
        '25' => 'Y-dược (bác sĩ, dược sĩ, điều dưỡng...)',
        '26' => 'Nghề nghiệp khác',
    ];

    private const RELIGION_MAP = [
        '1' => 'Không có Đạo',
        '2' => 'Đạo Cơ Đốc giáo',
        '3' => 'Đạo Phật',
        '4' => 'Đạo Thiên Chúa',
        '5' => 'Đạo Tin lành',
        '6' => 'Đạo khác',
    ];

    private const SMOKING_MAP = [
        '1' => 'Không hút thuốc',
        '2' => 'Chỉ hút xã giao',
        '3' => 'Hút thuốc ít',
        '4' => 'Hút thuốc nhiều',
        '5' => 'Hút thuốc rất nhiều',
    ];

    private const DRINKING_MAP = [
        '1' => 'Không uống rượu bia',
        '2' => 'Chỉ uống xã giao',
        '3' => 'Uống ít thôi',
        '4' => 'Uống nhiều',
        '5' => 'Uống rất nhiều',
    ];

    private const CHILDREN_MAP = [
        '1' => 'Chưa có',
        '2' => 'Đã có & Đang sống cùng',
        '3' => 'Đã có & Không sống cùng',
    ];

    private const OVERSEAS_MAP = [
        'usa' => 'USA (Mỹ)',
        'united-states' => 'USA (Mỹ)',
        'my' => 'USA (Mỹ)',
        'japan' => 'Nhật Bản (Japan)',
        'nhat' => 'Nhật Bản (Japan)',
        'nhat-ban' => 'Nhật Bản (Japan)',
        'australia' => 'Úc (Australia)',
        'uc' => 'Úc (Australia)',
        'canada' => 'Canada',
        'south-korea' => 'Hàn Quốc',
        'han-quoc' => 'Hàn Quốc',
        'korea' => 'Hàn Quốc',
        'taiwan' => 'Đài Loan',
        'dai-loan' => 'Đài Loan',
        'germany' => 'Đức (Germany)',
        'duc' => 'Đức (Germany)',
        'england' => 'Anh (UK)',
        'uk' => 'Anh (UK)',
        'anh' => 'Anh (UK)',
        'france' => 'Pháp (France)',
        'phap' => 'Pháp (France)',
        'singapore' => 'Singapore',
        'russia' => 'Nga (Russia)',
        'nga' => 'Nga (Russia)',
        'finland' => 'Phần Lan',
        'phan-lan' => 'Phần Lan',
        'other-country' => 'Quốc gia khác',
    ];

    private const PROVINCE_SLUG_MAP = [
        'ho-chi-minh' => 'Hồ Chí Minh',
        'ha-noi' => 'Hà Nội',
        'da-nang' => 'Đà Nẵng',
        'hai-phong' => 'Hải Phòng',
        'can-tho' => 'Cần Thơ',
        'an-giang' => 'An Giang',
        'ba-ria-vung-tau' => 'Bà Rịa - Vũng Tàu',
        'bac-giang' => 'Bắc Giang',
        'bac-kan' => 'Bắc Kạn',
        'bac-lieu' => 'Bạc Liêu',
        'bac-ninh' => 'Bắc Ninh',
        'ben-tre' => 'Bến Tre',
        'binh-dinh' => 'Bình Định',
        'binh-duong' => 'Bình Dương',
        'binh-phuoc' => 'Bình Phước',
        'binh-thuan' => 'Bình Thuận',
        'ca-mau' => 'Cà Mau',
        'cao-bang' => 'Cao Bằng',
        'dak-lak' => 'Đắk Lắk',
        'dak-nong' => 'Đắk Nông',
        'dien-bien' => 'Điện Biên',
        'dong-nai' => 'Đồng Nai',
        'dong-thap' => 'Đồng Tháp',
        'gia-lai' => 'Gia Lai',
        'ha-giang' => 'Hà Giang',
        'ha-nam' => 'Hà Nam',
        'ha-tinh' => 'Hà Tĩnh',
        'hai-duong' => 'Hải Dương',
        'hau-giang' => 'Hậu Giang',
        'hoa-binh' => 'Hòa Bình',
        'hung-yen' => 'Hưng Yên',
        'khanh-hoa' => 'Khánh Hòa',
        'kien-giang' => 'Kiên Giang',
        'kon-tum' => 'Kon Tum',
        'lai-chau' => 'Lai Châu',
        'lam-dong' => 'Lâm Đồng',
        'lang-son' => 'Lạng Sơn',
        'lao-cai' => 'Lào Cai',
        'long-an' => 'Long An',
        'nam-dinh' => 'Nam Định',
        'nghe-an' => 'Nghệ An',
        'ninh-binh' => 'Ninh Bình',
        'ninh-thuan' => 'Ninh Thuận',
        'phu-tho' => 'Phú Thọ',
        'phu-yen' => 'Phú Yên',
        'quang-binh' => 'Quảng Bình',
        'quang-nam' => 'Quảng Nam',
        'quang-ngai' => 'Quảng Ngãi',
        'quang-ninh' => 'Quảng Ninh',
        'quang-tri' => 'Quảng Trị',
        'soc-trang' => 'Sóc Trăng',
        'son-la' => 'Sơn La',
        'tay-ninh' => 'Tây Ninh',
        'thai-binh' => 'Thái Bình',
        'thai-nguyen' => 'Thái Nguyên',
        'thanh-hoa' => 'Thanh Hóa',
        'hue' => 'Thừa Thiên Huế',
        'tien-giang' => 'Tiền Giang',
        'tra-vinh' => 'Trà Vinh',
        'tuyen-quang' => 'Tuyên Quang',
        'vinh-long' => 'Vĩnh Long',
        'vinh-phuc' => 'Vĩnh Phúc',
        'yen-bai' => 'Yên Bái',
    ];

    public function showLogin(CaptchaService $captchaService): View
    {
        $recaptchaSiteKey = $captchaService->isEnabled() ? $captchaService->getSiteKey() : null;

        return view('themes.ehenho.pages.auth.login', compact('recaptchaSiteKey'));
    }

    public function login(Request $request, CaptchaService $captchaService): RedirectResponse
    {
        // Google reCAPTCHA Verification (server-side)
        if ($captchaService->isEnabled()) {
            $captchaToken = $request->input('g-recaptcha-response');
            if (empty($captchaToken) || ! $captchaService->verify($captchaToken, $request->ip())) {
                return back()->withErrors([
                    'g-recaptcha-response' => 'Xác thực Google reCAPTCHA không thành công. Vui lòng xác thực lại.',
                ])->onlyInput('email');
            }
        }

        $loginInput = trim((string) ($request->input('login') ?: ($request->input('email') ?: $request->input('username'))));
        $password = (string) $request->input('password');

        if (empty($loginInput) || empty($password)) {
            return back()->withErrors([
                'email' => 'Vui lòng nhập email hoặc tên đăng nhập và mật khẩu.',
            ])->onlyInput('email');
        }

        $remember = $request->boolean('remember');

        $isEmail = filter_var($loginInput, FILTER_VALIDATE_EMAIL);
        $primaryField = $isEmail ? 'email' : 'username';
        $fallbackField = $isEmail ? 'username' : 'email';

        $loggedIn = Auth::attempt([$primaryField => $loginInput, 'password' => $password], $remember)
            || Auth::attempt([$fallbackField => $loginInput, 'password' => $password], $remember);

        if ($loggedIn) {
            $request->session()->regenerate();
            $user = Auth::user();

            // If user has an administrative CMS role, setup project session and direct to CMS Admin
            $isAdmin = method_exists($user, 'canAccessEhenhoCms')
                ? $user->canAccessEhenhoCms()
                : (in_array($user->role, ['cms', 'admin', 'dev', 'super_admin', 'superadmin', 'manager', 'web_admin', 'store_manager', 'multi_tenancy'], true) || ($user->role !== 'user' && isset($user->level) && in_array((int) $user->level, [0, 1], true)));

            if ($isAdmin) {
                $project = Project::where('code', 'ehenho')->first();
                $tenantId = $user->tenant_id ?: ($project?->tenant_id ?? 7);

                $request->session()->put('current_tenant_id', $tenantId);
                $request->session()->put('project_user_id', $user->id);
                $request->session()->put('project_user_username', $user->username ?: $user->name);
                $request->session()->put('current_project', 'ehenho');
                $request->session()->put('current_project_id', $project?->id ?? 15);

                return redirect()->to('/ehenho/admin')->with('success', 'Đăng nhập trang quản trị eHenho thành công!');
            }

            // Normal dating member redirect
            $defaultRoute = ($request->routeIs('ehenho.domain.*') || $request->getHost() === 'ehenho.local')
                ? (Route::has('ehenho.domain.account.my_profile') ? route('ehenho.domain.account.my_profile') : url('/tai-khoan'))
                : (Route::has('ehenho.account.my_profile') ? route('ehenho.account.my_profile') : url('/ehenho/tai-khoan'));

            return redirect()->to($defaultRoute)->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Địa chỉ email/tên đăng nhập hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    public function showRegister(CaptchaService $captchaService): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('ehenho.account.my_profile');
        }

        $provinces = Province::orderBy('name')->get();
        $recaptchaSiteKey = $captchaService->isEnabled() ? $captchaService->getSiteKey() : null;

        return view('themes.ehenho.pages.auth.register', compact('provinces', 'recaptchaSiteKey'));
    }

    public function register(Request $request, CaptchaService $captchaService): RedirectResponse
    {
        // 1. Google reCAPTCHA Verification (server-side)
        if ($captchaService->isEnabled()) {
            $captchaToken = $request->input('g-recaptcha-response');
            if (empty($captchaToken) || ! $captchaService->verify($captchaToken, $request->ip())) {
                // Draft preservation without logging or persisting captcha token/secrets
                $draft = $request->except(['password', 'password_confirmation', 'g-recaptcha-response', '_token']);
                session(['registration_draft' => $draft]);

                return back()
                    ->withInput($draft)
                    ->withErrors([
                        'g-recaptcha-response' => 'Xác thực Google reCAPTCHA không thành công. Vui lòng xác thực lại.',
                    ]);
            }
        }

        $validated = $request->validate([
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:6',
            'name' => 'required|string|min:2|max:150',
            'dob_day' => 'nullable|integer|between:1,31',
            'dob_month' => 'nullable|integer|between:1,12',
            'dob_year' => 'nullable|integer|between:1950,2010',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'nullable|string',
            'look_for' => 'nullable|string',
            'height' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'education' => 'nullable|string',
            'province' => 'nullable|string',
            'province_id' => 'nullable',
            'district' => 'nullable|string|max:150',
            'headline' => 'nullable|string|max:255',
            'i_am' => 'nullable|string|max:10000',
            'my_match' => 'nullable|string|max:10000',
            'appearance2_0' => 'nullable|string',
            'interest2_0' => 'nullable|string',
            'personality2_0' => 'nullable|string',
            'way_of_life' => 'nullable|string',
            'most_valued' => 'nullable|string',
            'occupation2_0' => 'nullable|string',
            'religion2_0' => 'nullable|string',
            'smoking2_0' => 'nullable|string',
            'drinking2_0' => 'nullable|string',
            'children2_0' => 'nullable|string',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không đúng định dạng.',
            'email.unique' => 'Địa chỉ email này đã được đăng ký tài khoản.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'name.min' => 'Tên phải có ít nhất 2 ký tự.',
        ]);

        $year = (int) ($request->input('dob_year') ?: 2000);
        $month = (int) ($request->input('dob_month') ?: 1);
        $day = (int) ($request->input('dob_day') ?: 1);

        try {
            $birthCarbon = Carbon::createFromDate($year, $month, $day);
            $age = $birthCarbon->age;
            $birthday = $birthCarbon->toDateString();
        } catch (\Throwable) {
            $age = (int) ($request->input('age', 24));
            $birthday = null;
        }

        if ($age < 18) {
            $age = 18;
        }

        // Resolve province
        $provinceInput = (string) ($request->input('province') ?: $request->input('province_id', ''));
        $provinceId = null;
        $provinceName = null;
        $isOverseas = false;

        if (isset(self::OVERSEAS_MAP[$provinceInput])) {
            $provinceName = self::OVERSEAS_MAP[$provinceInput];
            $provinceId = null;
            $isOverseas = true;
        } elseif (isset(self::PROVINCE_SLUG_MAP[$provinceInput])) {
            $provinceName = self::PROVINCE_SLUG_MAP[$provinceInput];
            $p = Province::where('name', 'like', "%{$provinceName}%")->first();
            $provinceId = $p?->id;
        } elseif (is_numeric($provinceInput)) {
            $p = Province::find((int) $provinceInput);
            if ($p) {
                $provinceId = $p->id;
                $provinceName = preg_replace('/^(Tỉnh|Thành phố)\s+/u', '', $p->name);
            }
        } elseif (! empty($provinceInput)) {
            $cleanInput = preg_replace('/^(Tỉnh|Thành phố)\s+/u', '', $provinceInput);
            $p = Province::where('name', 'like', "%{$cleanInput}%")->first();
            if ($p) {
                $provinceId = $p->id;
                $provinceName = preg_replace('/^(Tỉnh|Thành phố)\s+/u', '', $p->name);
            } else {
                $provinceName = $cleanInput;
            }
        }

        $targetType = self::LOOK_FOR_MAP[$request->input('look_for')] ?? $request->input('look_for') ?? 'Tìm người yêu lâu dài';
        $maritalStatus = self::MARITAL_STATUS_MAP[$request->input('marital_status')] ?? $request->input('marital_status') ?? 'Độc thân';
        $education = self::EDUCATION_MAP[$request->input('education')] ?? $request->input('education');
        $appearance = self::APPEARANCE_MAP[$request->input('appearance2_0')] ?? $request->input('appearance2_0');
        $interest = self::INTEREST_MAP[$request->input('interest2_0')] ?? $request->input('interest2_0');
        $personality = self::PERSONALITY_MAP[$request->input('personality2_0')] ?? $request->input('personality2_0');
        $wayOfLife = self::WAY_OF_LIFE_MAP[$request->input('way_of_life')] ?? $request->input('way_of_life');
        $mostValued = self::MOST_VALUED_MAP[$request->input('most_valued')] ?? $request->input('most_valued');
        $occupation = self::OCCUPATION_MAP[$request->input('occupation2_0')] ?? $request->input('occupation2_0');
        $religion = self::RELIGION_MAP[$request->input('religion2_0')] ?? $request->input('religion2_0');
        $smoking = self::SMOKING_MAP[$request->input('smoking2_0')] ?? $request->input('smoking2_0');
        $drinking = self::DRINKING_MAP[$request->input('drinking2_0')] ?? $request->input('drinking2_0');
        $children = self::CHILDREN_MAP[$request->input('children2_0')] ?? $request->input('children2_0');

        // Quốc gia quốc tế thì chỉ cần tên quốc gia, không cần quận/huyện
        $districtInput = $isOverseas ? null : $request->input('district');
        $districtName = $isOverseas ? null : (Profile::resolveDistrictCode($districtInput) ?: $districtInput);

        // DB Transaction: atomicity for User and Profile creation
        [$user, $profile] = DB::transaction(function () use (
            $validated,
            $birthday,
            $age,
            $provinceId,
            $provinceName,
            $districtName,
            $targetType,
            $maritalStatus,
            $education,
            $appearance,
            $interest,
            $personality,
            $wayOfLife,
            $mostValued,
            $occupation,
            $religion,
            $smoking,
            $drinking,
            $children,
            $request
        ) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
                'level' => 2,
            ]);

            $profile = Profile::create([
                'user_id' => $user->id,
                'display_name' => $validated['name'],
                'slug' => Str::slug($validated['name']).'-'.$user->id,
                'headline' => $request->input('headline'),
                'target_type' => $targetType,
                'gender' => in_array($validated['gender'], ['male', 'female'], true) ? $validated['gender'] : 'female',
                'birthday' => $birthday,
                'age' => $age,
                'province_id' => $provinceId,
                'province_name' => $provinceName,
                'district_name' => $districtName,
                'marital_status' => $maritalStatus,
                'occupation' => $occupation,
                'height' => $request->input('height') ? (string) $request->input('height') : null,
                'weight' => $request->input('weight') ? (string) $request->input('weight') : null,
                'education' => $education,
                'body_type' => $appearance,
                'about_me' => $request->input('i_am'),
                'looking_for' => $request->input('my_match') ?: $targetType,
                'interests' => $interest,
                'personality' => $personality,
                'lifestyle' => $wayOfLife,
                'precious' => $mostValued,
                'religion' => $religion,
                'smoking' => $smoking,
                'drinking' => $drinking,
                'children' => $children,
                'status' => 'active',
                'is_online' => true,
                'last_active_at' => now(),
            ]);

            return [$user, $profile];
        });

        // Clear draft upon successful creation
        session()->forget('registration_draft');

        Auth::login($user);

        return redirect()->route('ehenho.profile.show', $profile->slug ?: $profile->id)
            ->with('success', 'Đăng ký thành công! Hồ sơ của bạn đã được khởi tạo hoàn tất.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $redirectRoute = ($request->routeIs('ehenho.domain.*') || $request->getHost() === 'ehenho.local')
            ? (Route::has('ehenho.domain.login.en') ? route('ehenho.domain.login.en') : (Route::has('ehenho.domain.login') ? route('ehenho.domain.login') : url('/login')))
            : (Route::has('ehenho.login.en') ? route('ehenho.login.en') : (Route::has('ehenho.login') ? route('ehenho.login') : url('/ehenho/login')));

        return redirect()->to($redirectRoute)->with('success', 'Bạn đã đăng xuất thành công.');
    }

    public function showForgotPassword(): View
    {
        return view('themes.ehenho.pages.auth.password_reset');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        return back()->with('success', 'Nếu email của bạn tồn tại trong hệ thống, hướng dẫn đặt lại mật khẩu đã được gửi đi.');
    }
}
