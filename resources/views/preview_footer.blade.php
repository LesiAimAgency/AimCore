@extends('themes.inbetween_v2.layouts.app')

@section('content')
<main class="w-full min-h-screen bg-[#131313]">
  @include('widgets.inbetween_v2.footer', [
    'settings' => [
      'logo_white' => '/storage/media/project-DA005/Logo-white.svg',
      'lang_en_label' => 'EN',
      'lang_zh_label' => '汉语',
      'top_connect_text' => "LET'S CONNECT",
      'top_connect_link' => '#contact-modal',
      'heading_prefix' => 'MORE',
      'rotating_words' => [
        ['text' => 'CONNECTIONS'],
        ['text' => 'OPPORTUNITIES'],
        ['text' => 'PARTNERSHIPS'],
        ['text' => 'NETWORKS'],
        ['text' => 'GROWTH'],
        ['text' => 'SOLUTIONS'],
      ],
      'form_title_line1' => 'READY TO BUILD',
      'form_title_highlight' => 'SOMETHING BOLD',
      'form_title_line2' => 'IN VIETNAM?',
      'form_privacy_text' => 'Tôi đã đọc và hoàn toàn đồng ý với Chính sách dữ liệu của Đại Phúc 68',
      'form_newsletter_text' => 'Gửi email cập nhật tin tức mới cho tôi',
      'contact_phone' => '0909 999 999',
      'contact_email' => 'inbetween.asia@gmail.com',
      'copyright_text' => 'Copyright belong to INBETWEEN',
      'powered_by_text' => 'Powered by AIM AGENCY',
    ]
  ])
</main>
@endsection
