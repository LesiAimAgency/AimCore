<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta content="IE=edge" http-equiv="X-UA-Compatible" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

@php
    $siteName = setting('site_name', 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách');
    $defaultTitle = setting_string('seo_meta_title') ?: 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương';
    $defaultDesc = setting_string('seo_meta_description') ?: 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách giúp bạn nhanh chóng tìm được một nửa yêu thương của mình.';
    $defaultKeywords = setting_string('seo_meta_keywords') ?: 'Hẹn hò online, Tìm bạn, Kết bạn, Tìm bạn bốn phương, Tìm bạn gái, Tìm bạn trai, Tìm người yêu, Tim ban bon phuong';
    $siteAuthor = setting_string('site_author') ?: 'eHenho.com, hi@ehenho.com';

    $siteLogo = setting('site_logo') ?: asset('themes/ehenho/images/ehenho_logo.png');
    $siteFavicon = setting('site_favicon') ?: asset('themes/ehenho/icons/favicon.png');
    $themeColor = setting('theme_color', '#007cae');
    $categoryBarColor = setting('category_bar_color', '#e85151');
    $headerBgColor = setting('header_bg_color', '#202020');
    $headerTextColor = setting('header_text_color', '#f0f0f0');
    $headerBtnColor = setting('header_button_color', '#d9534f');

    $googleAnalyticsId = setting_string('google_analytics_id');
    $googleSiteVerification = setting_string('google_site_verification');
    $bingSiteVerification = setting_string('bing_site_verification');
    $customHeaderCode = setting_string('custom_header_code');
    $customBodyCode = setting_string('custom_body_code');
    $customFooterCode = setting_string('custom_footer_code');

    $rawYieldTitle = trim($__env->yieldContent('title'));
    $pageTitle = $rawYieldTitle !== '' ? html_entity_decode($rawYieldTitle, ENT_QUOTES, 'UTF-8') : $defaultTitle;

    $rawYieldDesc = trim($__env->yieldContent('meta_description'));
    $pageDesc = $rawYieldDesc !== '' ? html_entity_decode($rawYieldDesc, ENT_QUOTES, 'UTF-8') : $defaultDesc;

    $rawYieldKeywords = trim($__env->yieldContent('meta_keywords'));
    $pageKeywords = $rawYieldKeywords !== '' ? html_entity_decode($rawYieldKeywords, ENT_QUOTES, 'UTF-8') : $defaultKeywords;

    $rawOgTitle = trim($__env->yieldContent('og_title'));
    $ogTitle = $rawOgTitle !== '' ? html_entity_decode($rawOgTitle, ENT_QUOTES, 'UTF-8') : $pageTitle;

    $rawOgDesc = trim($__env->yieldContent('og_description'));
    $ogDesc = $rawOgDesc !== '' ? html_entity_decode($rawOgDesc, ENT_QUOTES, 'UTF-8') : $pageDesc;
@endphp

  <title>{{ $pageTitle }}</title>
  <meta content="{{ $pageKeywords }}" name="keywords" />
  <meta content="{{ $pageDesc }}" name="description" />
  <meta content="{{ $siteAuthor }}" name="author" />
  
  <meta content="{{ url()->current() }}" property="og:url" />
  <meta content="{{ $ogTitle }}" property="og:title" />
  <meta content="{{ $ogDesc }}" property="og:description" />
  <meta content="@yield('og_image', asset('themes/ehenho/images/s1.jpg'))" property="og:image" />
  <meta content="Website" property="og:type" />

  @if($googleSiteVerification)
  <meta name="google-site-verification" content="{{ $googleSiteVerification }}" />
  @endif
  @if($bingSiteVerification)
  <meta name="msvalidate.01" content="{{ $bingSiteVerification }}" />
  @endif

  @if($googleAnalyticsId)
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalyticsId }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $googleAnalyticsId }}');
  </script>
  @endif

  @if($customHeaderCode)
  {!! $customHeaderCode !!}
  @endif

  <link href="{{ $siteFavicon }}" rel="icon" />

  <!-- Latest compiled and minified CSS -->
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/normalize.css') }}" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/base8.css') }}" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/carousel.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- Dynamic Admin Controlled Theme & Color Overrides -->
  <style id="ehenho-dynamic-colors">
    :root {
      --eh-theme-primary: {{ $themeColor }};
      --eh-category-bar: {{ $categoryBarColor }};
      --eh-header-bg: {{ $headerBgColor }};
      --eh-header-text: {{ $headerTextColor }};
      --eh-header-btn: {{ $headerBtnColor }};
    }
    .bs-docs-nav {
      background-color: var(--eh-header-bg) !important;
      border-color: var(--eh-theme-primary) !important;
    }
    .bs-docs-nav .navbar-collapse {
      border-color: var(--eh-theme-primary) !important;
    }
    .bs-docs-nav .navbar-nav>li>a {
      color: var(--eh-header-text) !important;
    }
    .bs-docs-nav .navbar-nav>li>a:hover {
      color: var(--eh-theme-primary) !important;
    }
    .bs-docs-nav .navbar-nav>.active>a,
    .bs-docs-nav .navbar-nav>.active>a:hover {
      color: #fff !important;
      background-color: var(--eh-theme-primary) !important;
    }
    .bs-docs-nav .navbar-toggle {
      border-color: var(--eh-theme-primary) !important;
    }
    .bs-docs-nav .navbar-toggle:hover {
      background-color: var(--eh-theme-primary) !important;
      border-color: var(--eh-theme-primary) !important;
    }
    .navlinkbar2 {
      background: var(--eh-category-bar) !important;
    }
    a.navlink1:hover,
    a.navlink1:active,
    a.navlink1:focus {
      background-color: var(--eh-theme-primary) !important;
    }
    .btn-pm-sft-cus {
      background-color: var(--eh-theme-primary) !important;
      border-color: var(--eh-theme-primary) !important;
      color: #fff !important;
    }
    .btn-dg-cus {
      background-color: var(--eh-header-btn) !important;
      border-color: var(--eh-header-btn) !important;
    }
    a.signup-btn {
      background-color: var(--eh-header-btn) !important;
      border-color: var(--eh-header-btn) !important;
      color: #fff !important;
    }
  </style>

  @stack('styles')
</head>

<body>
  @if($customBodyCode)
  {!! $customBodyCode !!}
  @endif

  @include('themes.ehenho.components.header')

  <div class="site-main-wrapper" style="min-height: 550px;">
    @yield('content')
  </div>

  @include('themes.ehenho.components.footer')

  <!-- JQuery JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ajaxError(function (event, jqxhr, settings, thrownError) {
      if (jqxhr.status === 419) {
        // Tự động tải lại trang nếu phiên làm việc hoặc CSRF token bị hết hạn
        window.location.reload();
      }
    });

    // Định kỳ giữ session hoạt động nếu tab đang mở (mỗi 15 phút)
    setInterval(function () {
      if (document.visibilityState === 'visible') {
        $.get('/up').fail(function (xhr) {
          if (xhr.status === 419) {
            window.location.reload();
          }
        });
      }
    }, 15 * 60 * 1000);

    $(document).ready(function () {
      $("span#mask-pw-dd, span#mask-pw").click(function (event) {
        var c_class = $(this).find("i").attr("class") || $("i#mask-pw-i-dd").attr("class");
        if (c_class && c_class.indexOf("fa-eye-slash") !== -1) {
          $(this).html('&nbsp;<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Hiện');
          $("input.c-password, input.c-password-dd, input#password_input").attr("type", "password");
        } else {
          $(this).html('&nbsp;<i class="fa fa-eye-slash" aria-hidden="true"></i>&nbsp;Che');
          $("input.c-password, input.c-password-dd, input#password_input").attr("type", "text");
        }
      });
    });
  </script>

  @include('themes.ehenho.components.chat-all')

  @stack('scripts')

  @if($customFooterCode)
  {!! $customFooterCode !!}
  @endif
</body>
</html>
