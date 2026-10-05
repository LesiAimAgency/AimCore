<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use App\Models\Ehenho\SocialConnection;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search with photo (Có Hình, Có Hình Nữ, Có Hình Nam)
     */
    public function withPhoto(Request $request, ?string $gender = null): View
    {
        $request->merge(['has_photo' => 1]);
        $pageTitle = 'Tìm bạn bốn phương có hình';

        if ($gender) {
            if (in_array($gender, ['nu', 'female'], true)) {
                $request->merge(['gender' => 'female']);
                $pageTitle = 'Tìm bạn bốn phương có hình (nữ)';
            } elseif (in_array($gender, ['nam', 'male'], true)) {
                $request->merge(['gender' => 'male']);
                $pageTitle = 'Tìm bạn bốn phương có hình (nam)';
            }
        }

        return $this->index($request, $pageTitle);
    }

    /**
     * Generic category search handler for footer SEO links
     */
    public function quickCategory(Request $request, array $filterParams, string $pageTitle): View
    {
        foreach ($filterParams as $key => $val) {
            $request->merge([$key => $val]);
        }

        return $this->index($request, $pageTitle);
    }

    /**
     * General Search & Results Index
     */
    public function index(Request $request, ?string $pageTitle = null): View
    {
        $query = Profile::where('status', 'active');
        $this->applyFilters($query, $request);

        $profiles = $query->orderByDesc('is_featured')->latest()->paginate(12)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        $recentFemaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'female')
            ->latest()
            ->take(5)
            ->get();

        $recentMaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'male')
            ->latest()
            ->take(5)
            ->get();

        return view('themes.ehenho.pages.search.index', compact(
            'profiles',
            'provinces',
            'recentFemaleProfiles',
            'recentMaleProfiles',
            'pageTitle'
        ));
    }

    /**
     * Search by Age Tab (Matches tim-ban-bon-phuong-theo-tuoi.html)
     */
    public function byAge(Request $request, ?string $age = null): View
    {
        $query = Profile::where('status', 'active');

        $selectedAge = $age ?: $request->input('age');
        $selectedGender = $request->input('gender');
        $hasPhoto = $request->boolean('has_photo') || $request->boolean('co_hinh');

        if ($selectedAge) {
            $this->applyAgeFilter($query, (string) $selectedAge);
        }

        if ($selectedGender && $selectedGender !== 'all') {
            $gender = in_array($selectedGender, ['female', 'nu'], true) ? 'female' : 'male';
            $query->where('gender', $gender);
        }

        if ($hasPhoto) {
            $query->whereNotNull('avatar_url')->where('avatar_url', '!=', '');
        }

        $profiles = $query->orderByDesc('is_featured')->latest()->paginate(12)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        $recentFemaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'female')
            ->latest()
            ->take(5)
            ->get();

        $recentMaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'male')
            ->latest()
            ->take(5)
            ->get();

        return view('themes.ehenho.pages.search.by_age', compact(
            'profiles',
            'provinces',
            'selectedAge',
            'selectedGender',
            'hasPhoto',
            'recentFemaleProfiles',
            'recentMaleProfiles'
        ));
    }

    /**
     * Search by Location / Province Tab
     */
    public function byLocation(Request $request, ?string $province = null): View
    {
        $selectedProvinceId = $province ?: $request->input('province');
        $selectedProvince = null;
        $pageTitle = null;

        if ($selectedProvinceId) {
            $normalizedId = strtolower((string) $selectedProvinceId);
            $foreignCountryMap = [
                'my' => ['country' => 'my', 'title' => 'Tìm bạn bốn phương ở USA – Mỹ'],
                'usa' => ['country' => 'my', 'title' => 'Tìm bạn bốn phương ở USA – Mỹ'],
                'united-states' => ['country' => 'my', 'title' => 'Tìm bạn bốn phương ở USA – Mỹ'],
                'uc' => ['country' => 'uc', 'title' => 'Tìm bạn bốn phương ở Úc'],
                'australia' => ['country' => 'uc', 'title' => 'Tìm bạn bốn phương ở Úc (Australia)'],
                'nhat' => ['country' => 'nhat', 'title' => 'Tìm bạn bốn phương ở Nhật'],
                'nhat-ban' => ['country' => 'nhat', 'title' => 'Tìm bạn bốn phương ở Nhật Bản'],
                'japan' => ['country' => 'nhat', 'title' => 'Tìm bạn bốn phương ở Nhật Bản'],
                'canada' => ['country' => 'canada', 'title' => 'Tìm bạn bốn phương ở Canada'],
                'duc' => ['country' => 'duc', 'title' => 'Tìm bạn bốn phương ở Đức'],
                'germany' => ['country' => 'duc', 'title' => 'Tìm bạn bốn phương ở Đức'],
                'han-quoc' => ['country' => 'han-quoc', 'title' => 'Tìm bạn bốn phương ở Hàn Quốc'],
                'south-korea' => ['country' => 'han-quoc', 'title' => 'Tìm bạn bốn phương ở Hàn Quốc'],
                'taiwan' => ['country' => 'taiwan', 'title' => 'Tìm bạn bốn phương ở Đài Loan'],
                'dai-loan' => ['country' => 'taiwan', 'title' => 'Tìm bạn bốn phương ở Đài Loan'],
            ];

            if (isset($foreignCountryMap[$normalizedId])) {
                return $this->quickCategory($request, ['country' => $foreignCountryMap[$normalizedId]['country']], $foreignCountryMap[$normalizedId]['title']);
            }
        }

        $query = Profile::where('status', 'active');

        if ($selectedProvinceId) {
            if (is_numeric($selectedProvinceId)) {
                $selectedProvince = Province::find($selectedProvinceId);
                $query->where('province_id', $selectedProvinceId);
                if ($selectedProvince) {
                    $pageTitle = 'Tìm Bạn Bốn Phương '.$selectedProvince->name;
                }
            } else {
                $provNormalized = str_replace('-', ' ', (string) $selectedProvinceId);
                $selectedProvince = Province::where('name', 'like', '%'.$provNormalized.'%')
                    ->orWhere('name', 'like', '%'.$selectedProvinceId.'%')
                    ->first();

                if ($selectedProvince) {
                    $query->where(function (Builder $sub) use ($selectedProvince) {
                        $sub->where('province_id', $selectedProvince->id)
                            ->orWhere('province_name', 'like', '%'.$selectedProvince->name.'%');
                    });
                    $pageTitle = 'Tìm Bạn Bốn Phương '.$selectedProvince->name;
                } else {
                    $query->where(function (Builder $sub) use ($selectedProvinceId, $provNormalized) {
                        $sub->where('province_name', 'like', '%'.$provNormalized.'%')
                            ->orWhere('province_name', 'like', '%'.$selectedProvinceId.'%');
                    });
                    $pageTitle = 'Tìm Bạn Bốn Phương '.ucwords($provNormalized);
                }
            }
        }

        $this->applyFilters($query, $request);

        $profiles = $query->orderByDesc('is_featured')->latest()->paginate(12)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        $recentFemaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'female')
            ->latest()
            ->take(5)
            ->get();

        $recentMaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'male')
            ->latest()
            ->take(5)
            ->get();

        return view('themes.ehenho.pages.search.by_location', compact(
            'profiles',
            'provinces',
            'selectedProvince',
            'recentFemaleProfiles',
            'recentMaleProfiles',
            'pageTitle'
        ));
    }

    /**
     * Detailed Search Filter Page (Bộ Lọc Tìm Kiếm Chi Tiết)
     */
    public function detailed(Request $request): View
    {
        $query = Profile::where('status', 'active');
        $this->applyFilters($query, $request);

        $profiles = $query->orderByDesc('is_featured')->latest()->paginate(12)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        $recentFemaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'female')
            ->latest()
            ->take(5)
            ->get();

        $recentMaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'male')
            ->latest()
            ->take(5)
            ->get();

        return view('themes.ehenho.pages.search.detailed', compact(
            'profiles',
            'provinces',
            'recentFemaleProfiles',
            'recentMaleProfiles'
        ));
    }

    /**
     * Apply all search filters safely with Vietnamese semantic normalization
     */
    protected function applyFilters(Builder $query, Request $request): void
    {
        // 0. Exclude blocked profiles (both blocked by current user and profiles that blocked current user)
        if (auth()->check()) {
            $userId = auth()->id();
            $blockedTargetIds = SocialConnection::where('user_id', $userId)
                ->where('relation_type', 'block')
                ->pluck('target_profile_id')
                ->toArray();

            if (! empty($blockedTargetIds)) {
                $query->whereNotIn('id', $blockedTargetIds);
            }
        }

        // 1. Gender filter
        if ($request->filled('gender') && $request->input('gender') !== 'all') {
            $gender = in_array($request->input('gender'), ['female', 'nu'], true) ? 'female' : 'male';
            $query->where('gender', $gender);
        }

        // 2. Age Range filter
        if ($request->filled('age')) {
            $this->applyAgeFilter($query, (string) $request->input('age'));
        } else {
            if ($request->filled('age_min')) {
                $query->where('age', '>=', (int) $request->input('age_min'));
            }
            if ($request->filled('age_max')) {
                $query->where('age', '<=', (int) $request->input('age_max'));
            }
        }

        // 3. Province filter
        if ($request->filled('province')) {
            $prov = $request->input('province');
            if (is_numeric($prov)) {
                $query->where('province_id', (int) $prov);
            } else {
                $pModel = Province::where('name', 'like', '%'.str_replace('-', ' ', (string) $prov).'%')->first();
                if ($pModel) {
                    $query->where('province_id', $pModel->id);
                } else {
                    $query->where('province_name', 'like', '%'.str_replace('-', ' ', (string) $prov).'%');
                }
            }
        }

        // 4. District filter
        if ($request->filled('district')) {
            $query->where('district_name', 'like', '%'.$request->input('district').'%');
        }

        // 5. Marital status filter (handling slugs and raw strings)
        if ($request->filled('marital_status')) {
            $marital = (string) $request->input('marital_status');
            if (in_array($marital, ['doc_than', 'doc-than'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('marital_status', 'like', '%độc thân%')
                        ->orWhere('marital_status', 'like', '%chưa từng%');
                });
            } elseif (in_array($marital, ['ly_di', 'ly-di', 'ly_hon'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('marital_status', 'like', '%ly dị%')
                        ->orWhere('marital_status', 'like', '%ly hôn%')
                        ->orWhere('marital_status', 'like', '%đã ly hôn%');
                });
            } elseif (in_array($marital, ['o_goa', 'o-goa', 'goa'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('marital_status', 'like', '%góa%')
                        ->orWhere('marital_status', 'like', '%ở góa%');
                });
            } else {
                $query->where('marital_status', 'like', '%'.$marital.'%');
            }
        }

        // 6. Looking for filter (handling slugs and raw strings)
        if ($request->filled('looking_for')) {
            $lookingFor = (string) $request->input('looking_for');
            if (in_array($lookingFor, ['ket_hon', 'ket-hon'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%kết hôn%')
                        ->orWhere('target_type', 'like', '%kết hôn%')
                        ->orWhere('headline', 'like', '%kết hôn%');
                });
            } elseif (in_array($lookingFor, ['nguoi_yeu', 'nguoi-yeu'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%người yêu%')
                        ->orWhere('looking_for', 'like', '%yêu%')
                        ->orWhere('target_type', 'like', '%người yêu%')
                        ->orWhere('headline', 'like', '%người yêu%');
                });
            } elseif (in_array($lookingFor, ['ngan_han', 'ngan-han'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%ngắn hạn%')
                        ->orWhere('target_type', 'like', '%ngắn hạn%')
                        ->orWhere('looking_for', 'like', '%giao lưu%')
                        ->orWhere('target_type', 'like', '%giao lưu%');
                });
            } elseif (in_array($lookingFor, ['chong'], true)) {
                $query->where('gender', 'male')
                    ->where(function (Builder $sub) {
                        $sub->where('looking_for', 'like', '%kết hôn%')
                            ->orWhere('target_type', 'like', '%kết hôn%')
                            ->orWhere('looking_for', 'like', '%chồng%')
                            ->orWhere('target_type', 'like', '%chồng%')
                            ->orWhere('target_type', 'like', '%bạn đời%');
                    });
            } elseif (in_array($lookingFor, ['vo'], true)) {
                $query->where('gender', 'female')
                    ->where(function (Builder $sub) {
                        $sub->where('looking_for', 'like', '%kết hôn%')
                            ->orWhere('target_type', 'like', '%kết hôn%')
                            ->orWhere('looking_for', 'like', '%vợ%')
                            ->orWhere('target_type', 'like', '%vợ%')
                            ->orWhere('target_type', 'like', '%bạn đời%');
                    });
            } elseif (in_array($lookingFor, ['ban_doi', 'ban-doi', 'mot_nua', 'tram_nam'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%bạn đời%')
                        ->orWhere('target_type', 'like', '%bạn đời%')
                        ->orWhere('looking_for', 'like', '%một nửa%')
                        ->orWhere('looking_for', 'like', '%trăm năm%')
                        ->orWhere('headline', 'like', '%bạn đời%');
                });
            } elseif (in_array($lookingFor, ['tam_su', 'tam-su'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%tâm sự%')
                        ->orWhere('target_type', 'like', '%tâm sự%')
                        ->orWhere('headline', 'like', '%tâm sự%');
                });
            } elseif (in_array($lookingFor, ['lam_quen', 'lam-quen'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%làm quen%')
                        ->orWhere('target_type', 'like', '%làm quen%')
                        ->orWhere('looking_for', 'like', '%kết bạn%')
                        ->orWhere('target_type', 'like', '%bạn bè mới%');
                });
            } elseif (in_array($lookingFor, ['chat'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('looking_for', 'like', '%chat%')
                        ->orWhere('target_type', 'like', '%chat%')
                        ->orWhere('looking_for', 'like', '%trò chuyện%')
                        ->orWhere('about_me', 'like', '%chat%');
                });
            } elseif (in_array($lookingFor, ['ban_gai', 'ban-gai'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('gender', 'female')
                        ->orWhere('looking_for', 'like', '%bạn gái%');
                });
            } elseif (in_array($lookingFor, ['ban_trai', 'ban-trai'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('gender', 'male')
                        ->orWhere('looking_for', 'like', '%bạn trai%');
                });
            } else {
                $query->where(function (Builder $sub) use ($lookingFor) {
                    $sub->where('looking_for', 'like', '%'.$lookingFor.'%')
                        ->orWhere('target_type', 'like', '%'.$lookingFor.'%')
                        ->orWhere('headline', 'like', '%'.$lookingFor.'%');
                });
            }
        }

        // 7. Country / Region filter
        if ($request->filled('country')) {
            $country = (string) $request->input('country');
            if (in_array($country, ['viet-nam', 'vietnam'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->whereNull('province_name')
                        ->orWhere(function ($q) {
                            $q->where('province_name', 'not like', '%Mỹ%')
                                ->where('province_name', 'not like', '%Úc%')
                                ->where('province_name', 'not like', '%Canada%')
                                ->where('province_name', 'not like', '%Đức%');
                        });
                });
            } elseif (in_array($country, ['nuoc-ngoai', 'nuoc_ngoai', 'overseas', 'viet-kieu', 'viet_kieu'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Mỹ%')
                        ->orWhere('province_name', 'like', '%Hoa Kỳ%')
                        ->orWhere('province_name', 'like', '%Úc%')
                        ->orWhere('province_name', 'like', '%Canada%')
                        ->orWhere('province_name', 'like', '%Đức%')
                        ->orWhere('province_name', 'like', '%Nước ngoài%')
                        ->orWhere('about_me', 'like', '%Việt kiều%')
                        ->orWhere('headline', 'like', '%Việt kiều%');
                });
            } elseif (in_array($country, ['my', 'viet-kieu-my', 'viet_kieu_my'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Mỹ%')
                        ->orWhere('province_name', 'like', '%Hoa Kỳ%')
                        ->orWhere('province_name', 'like', '%USA%')
                        ->orWhere('about_me', 'like', '%Mỹ%')
                        ->orWhere('headline', 'like', '%Mỹ%');
                });
            } elseif (in_array($country, ['uc'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Úc%')
                        ->orWhere('province_name', 'like', '%Australia%')
                        ->orWhere('about_me', 'like', '%Úc%')
                        ->orWhere('headline', 'like', '%Úc%');
                });
            } elseif (in_array($country, ['canada'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Canada%')
                        ->orWhere('about_me', 'like', '%Canada%')
                        ->orWhere('headline', 'like', '%Canada%');
                });
            } elseif (in_array($country, ['duc'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Đức%')
                        ->orWhere('province_name', 'like', '%Germany%')
                        ->orWhere('about_me', 'like', '%Đức%')
                        ->orWhere('headline', 'like', '%Đức%');
                });
            } elseif (in_array($country, ['nhat', 'nhat-ban', 'japan'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_id', 68)
                        ->orWhere('province_name', 'like', '%Nhật%')
                        ->orWhere('province_name', 'like', '%Japan%')
                        ->orWhere('district_name', 'like', '%Tokyo%')
                        ->orWhere('district_name', 'like', '%Osaka%')
                        ->orWhere('district_name', 'like', '%Nagoya%')
                        ->orWhere('district_name', 'like', '%Yokohama%')
                        ->orWhere('district_name', 'like', '%Fukuoka%')
                        ->orWhere('district_name', 'like', '%Chiba%')
                        ->orWhere('district_name', 'like', '%Saitama%')
                        ->orWhere('district_name', 'like', '%Nhật%')
                        ->orWhere('district_name', 'like', '%Japan%')
                        ->orWhere('about_me', 'like', '%Nhật%')
                        ->orWhere('headline', 'like', '%Nhật%');
                });
            } elseif (in_array($country, ['han-quoc', 'south-korea', 'korea'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Hàn Quốc%')
                        ->orWhere('province_name', 'like', '%Korea%')
                        ->orWhere('about_me', 'like', '%Hàn Quốc%')
                        ->orWhere('headline', 'like', '%Hàn Quốc%');
                });
            } elseif (in_array($country, ['taiwan', 'dai-loan'], true)) {
                $query->where(function (Builder $sub) {
                    $sub->where('province_name', 'like', '%Đài Loan%')
                        ->orWhere('province_name', 'like', '%Taiwan%')
                        ->orWhere('about_me', 'like', '%Đài Loan%')
                        ->orWhere('headline', 'like', '%Đài Loan%');
                });
            }
        }

        // 8. Has photo filter
        if ($request->boolean('has_photo') || $request->boolean('co_hinh')) {
            $query->whereNotNull('avatar_url')->where('avatar_url', '!=', '');
        }

        // 9. Keyword / Name search
        if ($request->filled('keyword') || $request->filled('name') || $request->filled('q')) {
            $kw = (string) ($request->input('keyword') ?: $request->input('name') ?: $request->input('q'));
            $query->where(function (Builder $sub) use ($kw) {
                $sub->where('display_name', 'like', '%'.$kw.'%')
                    ->orWhere('about_me', 'like', '%'.$kw.'%')
                    ->orWhere('headline', 'like', '%'.$kw.'%');
            });
        }

        // 10. Online status filter
        if ($request->boolean('is_online') || $request->input('online') === '1') {
            $query->where('is_online', true);
        }

        // 11. Featured status filter
        if ($request->boolean('is_featured') || $request->input('featured') === '1') {
            $query->where('is_featured', true);
        }
    }

    /**
     * Helper to apply age string filters like '18-22', '56-tuoi-tro-len', '56+'
     */
    protected function applyAgeFilter(Builder $query, string $age): void
    {
        if (str_contains($age, '-')) {
            $parts = explode('-', $age);
            if (isset($parts[0], $parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $query->whereBetween('age', [(int) $parts[0], (int) $parts[1]]);

                return;
            }
        }

        if (str_contains($age, '+') || str_contains($age, '56')) {
            $query->where('age', '>=', 56);

            return;
        }

        if (is_numeric($age)) {
            $query->where('age', (int) $age);
        }
    }
}
