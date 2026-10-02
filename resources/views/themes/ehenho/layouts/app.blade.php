<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta content="IE=edge" http-equiv="X-UA-Compatible" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách')</title>
  <meta content="@yield('meta_keywords', 'Hẹn hò online, Tìm bạn, Kết bạn, Tìm bạn bốn phương, Tìm bạn gái, Tìm bạn trai, Tìm người yêu, Tim ban bon phuong')" name="keywords" />
  <meta content="@yield('meta_description', 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách giúp bạn nhanh chóng tìm được một nửa yêu thương của mình.')" name="description" />
  <meta content="eHenho.com, hi@ehenho.com" name="author" />
  
  <meta content="{{ url()->current() }}" property="og:url" />
  <meta content="@yield('title', 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách')" property="og:title" />
  <meta content="@yield('meta_description', 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách.')" property="og:description" />
  <meta content="{{ asset('themes/ehenho/images/s1.jpg') }}" property="og:image" />
  <meta content="Website" property="og:type" />

  <link href="{{ asset('themes/ehenho/icons/favicon.png') }}" rel="icon" />

  <!-- Latest compiled and minified CSS -->
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/normalize.css') }}" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/base8.css') }}" rel="stylesheet" />
  <link href="{{ asset('themes/ehenho/css/carousel.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  @stack('styles')
</head>

<body>
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
  <script src="{{ asset('themes/ehenho/js/auth-session.js') }}"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

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

  @stack('scripts')
</body>
</html>
