/**
 * Vietnam Administrative Divisions Provider Integration for eHenho.com
 * Provider: https://provinces.open-api.vn/ (API v2 / v1)
 * Supports: Tỉnh / Thành phố -> Quận / Huyện -> Phường / Xã
 * Fallback: Local cached vietnam_provinces.json for zero-latency & offline preview
 */

(function($) {
    var API_BASE = "https://provinces.open-api.vn/api";
    var LOCAL_FALLBACK = "/themes/ehenho/js/vietnam_provinces.json";
    var provincesData = null; // Cache for provinces and districts

    // Mapping of common slugs to provider province codes
    var SLUG_TO_CODE = {
        "ho-chi-minh": 79,
        "ha-noi": 1,
        "da-nang": 48,
        "hai-phong": 31,
        "can-tho": 92,
        "an-giang": 89,
        "ba-ria-vung-tau": 77,
        "bac-giang": 24,
        "bac-kan": 6,
        "bac-lieu": 95,
        "bac-ninh": 27,
        "ben-tre": 83,
        "binh-dinh": 52,
        "binh-duong": 74,
        "binh-phuoc": 70,
        "binh-thuan": 60,
        "ca-mau": 96,
        "cao-bang": 4,
        "dak-lak": 66,
        "dak-nong": 67,
        "dien-bien": 11,
        "dong-nai": 75,
        "dong-thap": 87,
        "gia-lai": 64,
        "ha-giang": 2,
        "ha-nam": 35,
        "ha-tinh": 42,
        "hai-duong": 30,
        "hau-giang": 93,
        "hoa-binh": 17,
        "hung-yen": 33,
        "khanh-hoa": 56,
        "kien-giang": 91,
        "kon-tum": 62,
        "lai-chau": 12,
        "lam-dong": 68,
        "lang-son": 20,
        "lao-cai": 10,
        "long-an": 80,
        "nam-dinh": 36,
        "nghe-an": 40,
        "ninh-binh": 37,
        "ninh-thuan": 58,
        "phu-tho": 25,
        "phu-yen": 54,
        "quang-binh": 44,
        "quang-nam": 49,
        "quang-ngai": 51,
        "quang-ninh": 22,
        "quang-tri": 45,
        "soc-trang": 94,
        "son-la": 14,
        "tay-ninh": 72,
        "thai-binh": 34,
        "thai-nguyen": 19,
        "thanh-hoa": 38,
        "hue": 46,
        "tien-giang": 82,
        "tra-vinh": 84,
        "tuyen-quang": 8,
        "vinh-long": 86,
        "vinh-phuc": 26,
        "yen-bai": 15
    };

    var FOREIGN_COUNTRIES = [
        { val: "usa", name: "USA – Mỹ" },
        { val: "united-states", name: "USA – Mỹ" },
        { val: "my", name: "USA – Mỹ" },
        { val: "japan", name: "Nhật Bản (Nhật)" },
        { val: "nhat", name: "Nhật Bản (Nhật)" },
        { val: "nhat-ban", name: "Nhật Bản (Nhật)" },
        { val: "australia", name: "Úc (Australia)" },
        { val: "uc", name: "Úc (Australia)" },
        { val: "canada", name: "Canada" },
        { val: "south-korea", name: "Hàn Quốc" },
        { val: "han-quoc", name: "Hàn Quốc" },
        { val: "korea", name: "Hàn Quốc" },
        { val: "taiwan", name: "Đài Loan" },
        { val: "dai-loan", name: "Đài Loan" },
        { val: "germany", name: "Đức (Germany)" },
        { val: "duc", name: "Đức (Germany)" },
        { val: "england", name: "Anh (UK)" },
        { val: "uk", name: "Anh (UK)" },
        { val: "anh", name: "Anh (UK)" },
        { val: "france", name: "Pháp (France)" },
        { val: "phap", name: "Pháp (France)" },
        { val: "singapore", name: "Singapore" },
        { val: "russia", name: "Nga (Russia)" },
        { val: "nga", name: "Nga (Russia)" },
        { val: "finland", name: "Phần Lan" },
        { val: "phan-lan", name: "Phần Lan" },
        { val: "other-country", name: "Quốc gia khác" }
    ];

    function isForeign(val) {
        if (!val) return false;
        val = val.toString().toLowerCase().trim();
        for (var i = 0; i < FOREIGN_COUNTRIES.length; i++) {
            if (FOREIGN_COUNTRIES[i].val === val) return true;
        }
        return false;
    }

    function getProvinceCode(val) {
        if (!val) return null;
        if (/^\d+$/.test(val)) return parseInt(val, 10);
        var lower = val.toLowerCase().replace(/_/g, "-");
        if (SLUG_TO_CODE[lower]) return SLUG_TO_CODE[lower];
        return null;
    }

    // Load full provinces data from local cache or online API
    function loadProvinces(callback) {
        if (provincesData && provincesData.length > 0) {
            callback(provincesData);
            return;
        }

        // Try local cache first for instant load
        $.ajax({
            url: LOCAL_FALLBACK,
            dataType: "json",
            timeout: 2500,
            success: function(data) {
                provincesData = data;
                callback(data);
            },
            error: function() {
                // Fallback to online API
                $.ajax({
                    url: API_BASE + "/?depth=2",
                    dataType: "json",
                    timeout: 5000,
                    success: function(data) {
                        provincesData = data;
                        callback(data);
                    },
                    error: function() {
                        callback([]);
                    }
                });
            }
        });
    }

    // Populate Districts for a given province
    function loadDistricts(provVal) {
        var $prov = $("#id_province");
        var $dist = $("#id_district");
        var $distContainer = $("#district_container");
        var $loader = $("#loading_district_drop_down");
        var $foreignNotice = $("#foreign_notice");
        var $vietnamNotice = $("#vietnam_notice");

        if (isForeign(provVal)) {
            $loader.hide();
            $dist.empty().val('');
            if ($distContainer.length) {
                $distContainer.hide();
            } else {
                $dist.hide();
            }
            $foreignNotice.show();
            $vietnamNotice.hide();
            return;
        } else {
            $foreignNotice.hide();
            $vietnamNotice.show();
            if ($distContainer.length) {
                $distContainer.show();
            } else {
                $dist.show();
            }
        }

        $loader.show();
        $dist.empty().append('<option value="">-- Chọn Quận / Huyện / Thị xã --</option>');

        var provCode = getProvinceCode(provVal);

        loadProvinces(function(allProvinces) {
            var matchedProv = null;

            // Search by code or codename/name
            for (var i = 0; i < allProvinces.length; i++) {
                var p = allProvinces[i];
                if (p.code === provCode || p.codename === provVal || p.name.toLowerCase().indexOf(provVal.replace(/-/g, " ")) !== -1) {
                    matchedProv = p;
                    break;
                }
            }

            if (matchedProv && matchedProv.districts && matchedProv.districts.length > 0) {
                renderDistricts(matchedProv.districts);
            } else if (provCode) {
                // Fetch directly from API
                $.ajax({
                    url: API_BASE + "/p/" + provCode + "?depth=2",
                    dataType: "json",
                    timeout: 4000,
                    success: function(res) {
                        if (res && res.districts) {
                            renderDistricts(res.districts);
                        } else {
                            $loader.hide();
                            $dist.show();
                        }
                    },
                    error: function() {
                        $loader.hide();
                        $dist.show();
                    }
                });
            } else {
                $loader.hide();
                $dist.show();
            }
        });

        function renderDistricts(districts) {
            var selectedVal = $dist.attr('data-selected') || $dist.val() || '';
            $dist.empty().append('<option value="">-- Chọn Quận / Huyện / Thị xã --</option>');
            var found = false;
            for (var i = 0; i < districts.length; i++) {
                var d = districts[i];
                var isSelected = (selectedVal && (selectedVal === d.name || String(selectedVal) === String(d.code)));
                if (isSelected) found = true;
                $dist.append('<option value="' + d.name + '" data-code="' + d.code + '"' + (isSelected ? ' selected' : '') + '>' + d.name + '</option>');
            }
            if (!found && selectedVal) {
                for (var j = 0; j < districts.length; j++) {
                    if (String(districts[j].code) === String(selectedVal)) {
                        $dist.val(districts[j].name);
                        break;
                    }
                }
            }
            $loader.hide();
            $dist.show();
        }
    }

    // Initialize on document ready
    $(document).ready(function() {
        var $prov = $("#id_province");
        var $dist = $("#id_district");

        // Event listener on Province change
        $prov.on("change", function() {
            var val = $(this).val();
            $dist.removeAttr('data-selected');
            loadDistricts(val);
        });

        // Initial trigger
        var initialProv = $prov.val() || "ho-chi-minh";
        loadDistricts(initialProv);
    });

})(jQuery);