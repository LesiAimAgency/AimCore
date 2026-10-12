@php
  $phone = $settings['contact_phone'] ?? '0909 999 999';
  $email = $settings['contact_email'] ?? 'inbetween.asia@gmail.com';
  $copyright = $settings['copyright_text'] ?? 'Copyright belong to INBETWEEN';
  $poweredBy = $settings['powered_by_text'] ?? 'Powered by AIM AGENCY';

  $communityTitle = $settings['community_title'] ?? 'Join our Zalo Group';
  $communityDesc = $settings['community_desc'] ?? 'Join our Zalo Group for more information about upcoming events and update latest news.';
  $communityLinkText = $settings['community_link_text'] ?? 'JOIN GROUP';
  $communityLinkUrl = $settings['community_link_url'] ?? '#';
  $communityTarget = (!empty($communityLinkUrl) && str_starts_with($communityLinkUrl, 'http')) ? '_blank' : '_self';

  $facebookUrl = $settings['facebook_url'] ?? $settings['social_facebook_url'] ?? 'https://facebook.com';
  $instagramUrl = $settings['instagram_url'] ?? $settings['social_instagram_url'] ?? 'https://instagram.com';
  $linkedinUrl = $settings['linkedin_url'] ?? $settings['social_linkedin_url'] ?? 'https://linkedin.com';
  $tiktokUrl = $settings['tiktok_url'] ?? $settings['social_tiktok_url'] ?? 'https://tiktok.com';

  $headingPrefix = $settings['heading_prefix'] ?? 'MORE';
  $defaultRotatingWords = [
      ['text' => 'CONNECTS'],
      ['text' => 'CONNECTIONS'],
      ['text' => 'OPPORTUNITIES'],
      ['text' => 'PARTNERSHIPS'],
      ['text' => 'NETWORKS'],
      ['text' => 'GROWTH'],
      ['text' => 'SOLUTIONS'],
  ];
  $rotatingList = !empty($settings['rotating_words']) && is_array($settings['rotating_words']) ? array_values($settings['rotating_words']) : $defaultRotatingWords;
  $wordTexts = array_map(fn($w) => is_array($w) ? ($w['text'] ?? '') : (string)$w, $rotatingList);
  $wordTexts = array_values(array_filter($wordTexts, fn($t) => trim($t) !== ''));
  if (empty($wordTexts)) {
      $wordTexts = ['CONNECTS', 'CONNECTIONS', 'OPPORTUNITIES', 'PARTNERSHIPS', 'NETWORKS', 'GROWTH', 'SOLUTIONS'];
  }
  $initialWord = $wordTexts[0];

  $formTitle1 = $settings['form_title_line1'] ?? 'READY TO BUILD';
  $formTitleHighlight = $settings['form_title_highlight'] ?? 'SOMETHING BOLD';
  $formTitle2 = $settings['form_title_line2'] ?? 'IN VIETNAM?';
@endphp

<!-- Mobile Footer - 100% Identical to footer4.svg -->
<footer class="mobile-footer-root" id="mobile-footer" data-section="inbetween-footer" aria-label="Mobile Footer">
  {{-- Anchor targets for mobile nav drawer and page links --}}
  <div id="inbetween-footer" class="mobile-contact-anchor" aria-hidden="true"></div>
  <div id="inbetween-contact" class="mobile-contact-anchor" aria-hidden="true"></div>
  <div id="mobile-contact" class="mobile-contact-anchor" aria-hidden="true"></div>

  <div class="mobile-footer-container">
    <!-- 1. Top Heading: MORE CONNECTS (Centered, 28px, uppercase, bold) -->
    <div class="mobile-footer-heading-wrap">
      <h2 class="mobile-footer-heading select-none">
        <span class="mobile-footer-prefix">{{ $headingPrefix }}</span>
        <span class="mobile-footer-rotating-box"
              id="mobile-footer-rotating-wrapper"
              data-words='@json($wordTexts)'
              aria-live="polite">
          <span class="mobile-footer-word-active">{{ $initialWord }}</span>
        </span>
      </h2>
    </div>

    <!-- 2. Sub-title: READY TO BUILD SOMETHING BOLD IN VIETNAM? -->
    <div class="mobile-footer-subtitle-wrap">
      <h3 class="mobile-footer-subtitle">
        <span class="mobile-footer-sub-line1">{{ $formTitle1 }}</span>
        <span class="mobile-footer-sub-line2">
          <span class="mobile-footer-accent">{{ $formTitleHighlight }}</span> {{ $formTitle2 }}
        </span>
      </h3>
    </div>

    <!-- 3. Contact Form (100% Matching footer4.svg) -->
    <form id="mobile-footer-contact-form" action="{{ route('web.inbetween_v2.contact') }}" method="POST" class="mobile-footer-form" novalidate>
      @csrf

      <!-- Feedback Alert Banner -->
      <div id="mobile-footer-feedback" class="mobile-footer-feedback-banner" style="display: none;"></div>

      <!-- Field 1: Full Name -->
      <div class="mobile-footer-field">
        <label for="footer-input-fullname" class="mobile-footer-label">
          Full Name
        </label>
        <input type="text" id="footer-input-fullname" name="fullname" required autocomplete="name"
          class="mobile-footer-input" />
      </div>

      <!-- Field 2: Phone Number* -->
      <div class="mobile-footer-field">
        <label for="footer-input-phone" class="mobile-footer-label">
          Phone Number*
        </label>
        <input type="tel" id="footer-input-phone" name="phone" required autocomplete="tel"
          class="mobile-footer-input" />
      </div>

      <!-- Field 3: Email -->
      <div class="mobile-footer-field">
        <label for="footer-input-email" class="mobile-footer-label">
          Email
        </label>
        <input type="email" id="footer-input-email" name="email" autocomplete="email"
          class="mobile-footer-input" />
      </div>

      <!-- Field 4: Messages | Inquiry -->
      <div class="mobile-footer-field">
        <label for="footer-input-message" class="mobile-footer-label">
          Messages | Inquiry
        </label>
        <textarea id="footer-input-message" name="message" rows="3"
          class="mobile-footer-textarea"></textarea>
      </div>

      <!-- Field 5: Service Needed (Dropdown with divider line & chevron) -->
      <div class="mobile-footer-field">
        <label class="mobile-footer-label">
          Service Needed
        </label>
        <div class="mobile-footer-dropdown-wrap" id="mobile-service-dropdown">
          <input type="hidden" name="service" value="Sale & BD" id="mobile-service-val">
          <button type="button" class="mobile-footer-dropdown-btn" id="mobile-service-trigger" aria-haspopup="listbox" aria-expanded="false">
            <span class="mobile-footer-dropdown-selected" id="mobile-service-label">Sale & BD</span>
            <div class="mobile-footer-dropdown-right">
              <span class="mobile-footer-dropdown-divider"></span>
              <span class="mobile-footer-dropdown-arrow-box">
                <svg class="mobile-footer-dropdown-arrow" id="mobile-service-arrow" viewBox="364.5 573 9.635 6.5" fill="none">
                  <path d="M369.317 579.5L364.5 573.719L365.176 573L369.317 578.062L373.459 573L374.135 573.719L369.317 579.5Z" fill="currentColor"/>
                </svg>
              </span>
            </div>
          </button>
          <ul class="mobile-footer-dropdown-menu" id="mobile-service-options" role="listbox" style="display: none;">
            <li class="mobile-footer-dropdown-item active" data-value="Sale & BD" role="option">Sale & BD</li>
            <li class="mobile-footer-dropdown-item" data-value="Market Validation" role="option">Market Validation</li>
            <li class="mobile-footer-dropdown-item" data-value="Market Entry Execution" role="option">Market Entry Execution</li>
            <li class="mobile-footer-dropdown-item" data-value="Local Business Support" role="option">Local Business Support</li>
          </ul>
        </div>
      </div>
    </form>

    <!-- 4. in • between Logo (Vector SVG matching footer4.svg with orange dot) -->
    <div class="mobile-footer-logo-wrap">
      <a href="#mobile-hero" class="mobile-footer-logo-link" aria-label="in • between">
        <svg class="mobile-footer-logo-svg" viewBox="88.5 658 263 41" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g>
            <path d="M198.527 686.694C198.427 689.871 200.884 691.614 204.147 691.547C206.23 691.502 207.885 690.619 209.245 688.911L215.137 691.844C213.727 694.277 211.642 695.977 209.08 696.98C203.497 698.815 197.884 698.353 193.654 694.107C191.742 692.189 190.584 689.894 190.179 687.266C189.749 690.579 188.324 693.287 185.919 695.385C181.741 699.025 174.653 698.953 170.838 694.597L170.808 697.297L162.833 697.292V658.01L170.911 658L170.921 676.052C174.463 672.779 179.761 672.367 183.916 674.405C187.474 676.392 189.712 679.878 190.177 684.018C191.119 677.71 196.704 673.039 203.217 673.177C205.217 673.212 207.107 673.537 208.912 674.337C213.97 676.575 215.86 681.318 215.513 686.694H198.532H198.527ZM207.62 682.211C207.295 679.465 205.17 678.293 202.882 678.443C200.729 678.488 198.864 679.855 198.734 682.228L207.62 682.211ZM181.721 685.596C181.721 682.541 179.246 680.065 176.191 680.065C173.136 680.065 170.661 682.541 170.661 685.596C170.661 688.651 173.136 691.127 176.191 691.127C179.246 691.127 181.721 688.651 181.721 685.596Z" fill="#F6F2EF" />
            <path d="M241.829 697.317L231.613 678.273L231.463 680.023L226.561 680.028L226.581 688.301C226.581 689.164 226.993 690.026 227.576 690.559C228.613 690.884 229.528 690.619 230.391 689.976L232.416 696.522C228.211 698.753 221.865 698.778 219.66 694.345C218.92 692.859 218.495 691.214 218.493 689.529L218.473 680.03L215.098 680.02V673.857L218.478 673.852V665.131H226.568L226.563 673.847L238.566 673.864L244.279 686.471L249.891 673.879L255.469 673.859L261.092 686.506L266.812 673.857L276.12 673.864L263.567 697.287L258.087 697.307L252.684 685.201L247.311 697.272L241.831 697.322L241.829 697.317Z" fill="#F6F2EF" />
            <path d="M324.354 691.866C321.433 696.997 315.021 698.765 309.476 697.705C304.22 696.702 299.825 692.119 299.34 686.693H282.44C282.315 688.681 283.385 690.304 285.222 691.064C287.007 691.804 288.965 691.629 290.802 690.971L293.235 688.964L299.038 691.866C297.47 694.482 295.13 696.375 292.2 697.232C289.535 698.012 286.767 698.26 283.997 697.672C280.082 696.84 276.747 694.182 275.064 690.526C271.967 683.8 275.842 676.027 282.827 673.802C285.877 672.829 289.115 672.999 292.067 674.042C296.33 675.547 298.88 679.12 299.413 683.728C300.59 677.405 306.198 672.907 312.696 673.192C315.008 673.234 317.198 673.729 319.193 674.872C323.509 677.342 325.021 681.683 324.734 686.693H307.748C307.63 688.684 308.696 690.301 310.533 691.064C312.276 691.786 314.168 691.626 315.991 691.029L318.546 688.961L324.354 691.866ZM291.542 682.21C291.195 679.472 289.03 678.262 286.727 678.45C284.595 678.497 282.77 679.882 282.642 682.228L291.545 682.21H291.542ZM316.856 682.21C316.508 679.472 314.343 678.262 312.041 678.45C309.908 678.497 308.083 679.882 307.955 682.228L316.858 682.21H316.856Z" fill="#F6F2EF" />
            <path d="M113.981 679.508C111.683 679.303 108.906 681.178 108.888 683.574L108.783 697.298H100.713V673.852L108.773 673.857L108.821 676.375C110.483 674.805 112.156 673.597 114.343 673.292C117.094 672.907 119.824 673.597 122.201 674.985C124.579 676.373 125.701 678.635 125.879 681.263L125.886 697.298H117.794V683.616C117.529 681.563 116.318 679.718 113.978 679.508H113.981Z" fill="#F6F2EF" />
            <path d="M335.945 680.855C335.062 681.69 334.527 682.628 334.412 683.796V697.297H326.332V673.857H334.402L334.452 676.335C336.035 674.917 337.615 673.667 339.755 673.332C342.79 672.857 345.965 673.639 348.458 675.417C350.453 676.84 351.4 679.12 351.498 681.545V697.297H343.418V683.988C343.365 682.333 342.595 680.738 341.135 679.95C339.413 679.02 337.372 679.502 335.945 680.858V680.855Z" fill="#F6F2EF" />
            <path d="M97.2175 673.854H89.1396V697.295H97.2175V673.854Z" fill="#F6F2EF" />
            <path d="M144.099 690.214C146.988 690.214 149.33 687.872 149.33 684.984C149.33 682.095 146.988 679.753 144.099 679.753C141.211 679.753 138.869 682.095 138.869 684.984C138.869 687.872 141.211 690.214 144.099 690.214Z" fill="#EC460B" />
            <path d="M93.2902 668.966C95.9357 668.966 98.0804 666.821 98.0804 664.175C98.0804 661.53 95.9357 659.385 93.2902 659.385C90.6446 659.385 88.5 661.53 88.5 664.175C88.5 666.821 90.6446 668.966 93.2902 668.966Z" fill="#F6F2EF" />
          </g>
        </svg>
      </a>
    </div>

    <!-- 5. Contact infomations -->
    <div class="mobile-footer-info-section">
      <div class="mobile-footer-section-label">Contact infomations</div>
      <div class="mobile-footer-info-line">
        P: <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="mobile-footer-link">{{ $phone }}</a>
      </div>
      <div class="mobile-footer-info-line" style="margin-top: 6px;">
        E: <a href="mailto:{{ $email }}" class="mobile-footer-link">{{ $email }}</a>
      </div>
    </div>

    <!-- 6. Quick links (2-column layout matching footer4.svg) -->
    <div class="mobile-footer-links-section">
      <div class="mobile-footer-section-label">Quick links</div>
      <div class="mobile-footer-links-grid">
        <div class="mobile-footer-links-col">
          <a href="#mobile-hero" class="mobile-footer-link">About Us</a>
          <a href="#mobile-where-we-focus" class="mobile-footer-link">Where We Focus</a>
          <a href="#mobile-founder" class="mobile-footer-link">The Founder</a>
        </div>
        <div class="mobile-footer-links-col">
          <a href="#mobile-what-we-do" class="mobile-footer-link">What We Do</a>
          <a href="#mobile-our-clients" class="mobile-footer-link">Our Clients</a>
          <a href="#mobile-business" class="mobile-footer-link">Beyond Business</a>
        </div>
      </div>
    </div>

    <!-- 7. Join our Zalo Group + JOIN GROUP pill button -->
    <div class="mobile-footer-community-section">
      <div class="mobile-footer-section-label">{{ $communityTitle }}</div>
      <p class="mobile-footer-community-desc">
        {{ $communityDesc }}
      </p>
      <a href="{{ $communityLinkUrl ?: '#' }}" target="{{ $communityTarget }}" rel="noopener noreferrer"
         class="mobile-footer-pill-btn">
        <svg class="mobile-footer-pill-arrow" viewBox="51 1034 11 11" fill="none">
          <path d="M51.8337 1040.17H59.7403L57.3203 1043.07C57.2643 1043.14 57.2221 1043.22 57.1961 1043.3C57.1702 1043.39 57.1609 1043.47 57.169 1043.56C57.1852 1043.74 57.2708 1043.9 57.407 1044.01C57.5431 1044.13 57.7187 1044.18 57.8949 1044.16C58.0712 1044.15 58.2338 1044.06 58.347 1043.93L61.6803 1039.93C61.7028 1039.89 61.7228 1039.86 61.7403 1039.83C61.7403 1039.79 61.7737 1039.77 61.787 1039.74C61.8172 1039.66 61.833 1039.58 61.8337 1039.5C61.833 1039.42 61.8172 1039.34 61.787 1039.26C61.787 1039.23 61.7537 1039.21 61.7403 1039.17C61.7228 1039.14 61.7028 1039.1 61.6803 1039.07L58.347 1035.07C58.2843 1035 58.2058 1034.94 58.1171 1034.9C58.0284 1034.85 57.9316 1034.83 57.8337 1034.83C57.6779 1034.83 57.5269 1034.89 57.407 1034.99C57.3395 1035.04 57.2837 1035.11 57.2428 1035.19C57.2019 1035.27 57.1767 1035.35 57.1686 1035.44C57.1606 1035.53 57.1698 1035.61 57.1959 1035.7C57.2219 1035.78 57.2642 1035.86 57.3203 1035.93L59.7403 1038.83H51.8337C51.6568 1038.83 51.4873 1038.9 51.3623 1039.03C51.2372 1039.15 51.167 1039.32 51.167 1039.5C51.167 1039.68 51.2372 1039.85 51.3623 1039.97C51.4873 1040.1 51.6568 1040.17 51.8337 1040.17Z" fill="currentColor"/>
        </svg>
        <span>{{ $communityLinkText }}</span>
      </a>
    </div>

    <!-- 8. Explore more on our Social Media + 4 Icons -->
    <div class="mobile-footer-social-section">
      <div class="mobile-footer-social-text">
        <div>Explore more on</div>
        <div>our Social Media</div>
      </div>
      <div class="mobile-footer-social-icons">
        @if(!empty($facebookUrl))
          <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer" class="mobile-footer-social-icon-link" aria-label="Facebook">
            <svg class="mobile-footer-social-icon" viewBox="272 1089 24 24" fill="none"><path d="M284 1089C277.373 1089 272 1094.37 272 1101C272 1106.63 275.875 1111.35 281.101 1112.65V1104.67H278.627V1101H281.101V1099.42C281.101 1095.34 282.95 1093.44 286.96 1093.44C287.72 1093.44 289.032 1093.59 289.568 1093.74V1097.06C289.285 1097.03 288.793 1097.02 288.182 1097.02C286.215 1097.02 285.454 1097.77 285.454 1099.7V1101H289.374L288.701 1104.67H285.454V1112.91C291.396 1112.19 296 1107.14 296 1101C296 1094.37 290.627 1089 284 1089Z" fill="currentColor"/></svg>
          </a>
        @endif
        @if(!empty($instagramUrl))
          <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="mobile-footer-social-icon-link" aria-label="Instagram">
            <svg class="mobile-footer-social-icon" viewBox="308 1089 24 24" fill="none"><path d="M320 1091.16C323.206 1091.16 323.586 1091.17 324.847 1091.23C326.019 1091.28 326.652 1091.48 327.073 1091.64C327.631 1091.86 328.034 1092.12 328.452 1092.54C328.873 1092.96 329.131 1093.36 329.347 1093.92C329.511 1094.34 329.708 1094.98 329.759 1096.14C329.816 1097.41 329.83 1097.79 329.83 1100.99C329.83 1104.2 329.816 1104.58 329.759 1105.84C329.708 1107.01 329.511 1107.64 329.347 1108.06C329.131 1108.62 328.869 1109.03 328.452 1109.44C328.03 1109.86 327.631 1110.12 327.073 1110.34C326.652 1110.5 326.014 1110.7 324.847 1110.75C323.581 1110.81 323.202 1110.82 320 1110.82C316.794 1110.82 316.414 1110.81 315.153 1110.75C313.981 1110.7 313.348 1110.5 312.927 1110.34C312.369 1110.12 311.966 1109.86 311.548 1109.44C311.127 1109.02 310.869 1108.62 310.653 1108.06C310.489 1107.64 310.292 1107 310.241 1105.84C310.184 1104.57 310.17 1104.19 310.17 1100.99C310.17 1097.78 310.184 1097.4 310.241 1096.14C310.292 1094.97 310.489 1094.34 310.653 1093.92C310.869 1093.36 311.131 1092.96 311.548 1092.54C311.97 1092.12 312.369 1091.86 312.927 1091.64C313.348 1091.48 313.986 1091.28 315.153 1091.23C316.414 1091.17 316.794 1091.16 320 1091.16ZM320 1089C316.742 1089 316.334 1089.01 315.055 1089.07C313.78 1089.13 312.903 1089.33 312.144 1089.63C311.352 1089.94 310.681 1090.35 310.016 1091.02C309.345 1091.68 308.938 1092.35 308.628 1093.14C308.333 1093.9 308.127 1094.77 308.07 1096.05C308.014 1097.33 308 1097.74 308 1101C308 1104.26 308.014 1104.67 308.07 1105.95C308.127 1107.22 308.333 1108.1 308.628 1108.86C308.938 1109.65 309.345 1110.32 310.016 1110.98C310.681 1111.65 311.352 1112.06 312.139 1112.37C312.903 1112.66 313.775 1112.87 315.05 1112.92C316.33 1112.98 316.738 1113 319.995 1113C323.253 1113 323.661 1112.98 324.941 1112.92C326.216 1112.87 327.092 1112.66 327.852 1112.37C328.639 1112.06 329.309 1111.65 329.975 1110.98C330.641 1110.32 331.053 1109.65 331.358 1108.86C331.653 1108.1 331.859 1107.23 331.916 1105.95C331.972 1104.67 331.986 1104.26 331.986 1101C331.986 1097.75 331.972 1097.34 331.916 1096.06C331.859 1094.78 331.653 1093.91 331.358 1093.15C331.062 1092.35 330.655 1091.68 329.984 1091.02C329.319 1090.35 328.648 1089.94 327.861 1089.63C327.097 1089.34 326.225 1089.13 324.95 1089.08C323.666 1089.01 323.258 1089 320 1089Z" fill="currentColor"/><path d="M320 1094.84C316.597 1094.84 313.836 1097.6 313.836 1101C313.836 1104.4 316.597 1107.16 320 1107.16C323.403 1107.16 326.164 1104.4 326.164 1101C326.164 1097.6 323.403 1094.84 320 1094.84ZM320 1105C317.792 1105 316.002 1103.21 316.002 1101C316.002 1098.79 317.792 1097 320 1097C322.208 1097 323.998 1098.79 323.998 1101C323.998 1103.21 322.208 1105 320 1105Z" fill="currentColor"/><path d="M327.847 1094.59C327.847 1095.39 327.2 1096.03 326.408 1096.03C325.611 1096.03 324.969 1095.38 324.969 1094.59C324.969 1093.8 325.616 1093.15 326.408 1093.15C327.2 1093.15 327.847 1093.8 327.847 1094.59Z" fill="currentColor"/></svg>
          </a>
        @endif
        @if(!empty($linkedinUrl))
          <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer" class="mobile-footer-social-icon-link" aria-label="LinkedIn">
            <svg class="mobile-footer-social-icon" viewBox="344 1089 24 24" fill="none"><path d="M366.223 1089H345.772C344.792 1089 344 1089.77 344 1090.73V1111.27C344 1112.22 344.792 1113 345.772 1113H366.223C367.203 1113 368 1112.22 368 1111.27V1090.73C368 1089.77 367.203 1089 366.223 1089ZM351.12 1109.45H347.558V1098H351.12V1109.45ZM349.339 1096.43C348.195 1096.43 347.272 1095.51 347.272 1094.37C347.272 1093.23 348.195 1092.31 349.339 1092.31C350.478 1092.31 351.402 1093.23 351.402 1094.37C351.402 1095.51 350.478 1096.43 349.339 1096.43ZM364.452 1109.45H360.894V1103.88C360.894 1102.56 360.87 1100.85 359.042 1100.85C357.191 1100.85 356.909 1102.29 356.909 1103.79V1109.45H353.356V1098H356.769V1099.56H356.816C357.289 1098.66 358.452 1097.71 360.181 1097.71C363.786 1097.71 364.452 1100.08 364.452 1103.17V1109.45Z" fill="currentColor"/></svg>
          </a>
        @endif
        @if(!empty($tiktokUrl))
          <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer" class="mobile-footer-social-icon-link" aria-label="TikTok">
            <svg class="mobile-footer-social-icon" viewBox="382 1089 24 24" fill="none"><path d="M397.073 1089H393.028V1105.35C393.028 1107.3 391.472 1108.9 389.536 1108.9C387.6 1108.9 386.045 1107.3 386.045 1105.35C386.045 1103.43 387.566 1101.87 389.433 1101.8V1097.7C385.319 1097.77 382 1101.14 382 1105.35C382 1109.59 385.388 1113 389.571 1113C393.754 1113 397.142 1109.56 397.142 1105.35V1096.97C398.663 1098.08 400.529 1098.74 402.5 1098.77V1094.67C399.458 1094.57 397.073 1092.06 397.073 1089Z" fill="currentColor"/></svg>
          </a>
        @endif
      </div>
    </div>

    <!-- 9. Copyright (Centered, 2 lines matching footer4.svg) -->
    <div class="mobile-footer-copyright-wrap select-none">
      <div>{{ $copyright }}</div>
      <div>{{ $poweredBy }}</div>
    </div>
  </div>
</footer>

<!-- 100% Scoped CSS matching footer4.svg precisely -->
<style>
  #mobile-footer.mobile-footer-root {
    position: relative;
    width: 100%;
    background-color: #131313 !important;
    color: #F6F2EF !important;
    padding-top: 44px;
    padding-bottom: 52px;
    box-sizing: border-box;
    font-family: inherit;
    overflow-x: hidden;
  }

  #mobile-footer .mobile-contact-anchor {
    position: absolute;
    top: -48px;
    left: 0;
    width: 0;
    height: 0;
    pointer-events: none;
  }

  #mobile-footer .mobile-footer-container {
    width: 100%;
    max-width: 440px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 36.25px;
    padding-right: 36.25px;
    box-sizing: border-box;
  }

  @media (max-width: 380px) {
    #mobile-footer .mobile-footer-container {
      padding-left: 20px;
      padding-right: 20px;
    }
  }

  /* 1. Heading MORE CONNECTS */
  #mobile-footer .mobile-footer-heading-wrap {
    text-align: center;
    width: 100%;
    overflow: hidden;
  }

  #mobile-footer .mobile-footer-heading {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin: 0;
    font-size: clamp(23px, 6.8vw, 28px);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    line-height: 1.2;
    max-width: 100%;
  }

  #mobile-footer .mobile-footer-prefix {
    color: #FFFFFF !important;
    flex-shrink: 0;
    display: inline-block;
    line-height: 1.2;
  }

  #mobile-footer .mobile-footer-rotating-box {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: flex-start;
    overflow: hidden;
    height: 1.25em;
    line-height: 1.25em;
    vertical-align: middle;
    color: #EC460B !important;
    text-align: left;
    white-space: nowrap;
    min-width: 215px;
    width: 215px;
    max-width: calc(100vw - 120px);
    flex-shrink: 0;
  }

  #mobile-footer .mobile-footer-word-active,
  #mobile-footer .mobile-footer-word-incoming {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    white-space: nowrap;
    will-change: transform, opacity;
    font-weight: 700;
    color: #EC460B !important;
    line-height: 1;
    text-align: left;
    pointer-events: none;
  }

  /* 2. Sub-title READY TO BUILD */
  #mobile-footer .mobile-footer-subtitle-wrap {
    margin-top: 50px;
    margin-bottom: 26px;
    text-align: left;
  }

  #mobile-footer .mobile-footer-subtitle {
    margin: 0;
    font-size: 17.5px;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.3;
    letter-spacing: normal;
  }

  #mobile-footer .mobile-footer-sub-line1 {
    display: block;
    color: #FFFFFF !important;
  }

  #mobile-footer .mobile-footer-sub-line2 {
    display: block;
    color: #FFFFFF !important;
  }

  #mobile-footer .mobile-footer-accent {
    color: #EC460B !important;
  }

  /* 3. Form Fields */
  #mobile-footer .mobile-footer-form {
    display: flex;
    flex-direction: column;
    gap: 14px;
    width: 100%;
  }

  #mobile-footer .mobile-footer-field {
    text-align: left;
    width: 100%;
  }

  #mobile-footer .mobile-footer-label {
    display: block;
    font-size: 12px;
    font-weight: 400;
    color: #F6F2EF !important;
    margin-bottom: 8px;
    line-height: 1;
    letter-spacing: normal;
  }

  #mobile-footer .mobile-footer-input {
    width: 100%;
    height: 43.5px;
    padding: 0 14px;
    background-color: transparent !important;
    border: 0.5px solid rgba(246, 242, 239, 0.4) !important;
    border-radius: 4px !important;
    font-size: 13.5px;
    color: #FFFFFF !important;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.2s ease;
    font-family: inherit;
  }

  #mobile-footer .mobile-footer-input:focus {
    border-color: #EC460B !important;
  }

  #mobile-footer .mobile-footer-textarea {
    width: 100%;
    height: 79.5px;
    padding: 10px 14px;
    background-color: transparent !important;
    border: 0.5px solid rgba(246, 242, 239, 0.4) !important;
    border-radius: 4px !important;
    font-size: 13.5px;
    color: #FFFFFF !important;
    box-sizing: border-box;
    outline: none;
    resize: none;
    transition: border-color 0.2s ease;
    font-family: inherit;
  }

  #mobile-footer .mobile-footer-textarea:focus {
    border-color: #EC460B !important;
  }

  /* Dropdown Box */
  #mobile-footer .mobile-footer-dropdown-wrap {
    position: relative;
    width: 100%;
  }

  #mobile-footer .mobile-footer-dropdown-btn {
    width: 100%;
    height: 43.5px;
    padding: 0 0 0 14px;
    background-color: transparent !important;
    border: 0.5px solid rgba(246, 242, 239, 0.4) !important;
    border-radius: 4px !important;
    font-size: 13px;
    color: #818181 !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-sizing: border-box;
    cursor: pointer;
    outline: none;
    transition: border-color 0.2s ease;
    user-select: none;
  }

  #mobile-footer .mobile-footer-dropdown-btn:focus {
    border-color: #EC460B !important;
  }

  #mobile-footer .mobile-footer-dropdown-selected {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #818181 !important;
  }

  #mobile-footer .mobile-footer-dropdown-right {
    display: flex;
    align-items: center;
    height: 100%;
    flex-shrink: 0;
  }

  #mobile-footer .mobile-footer-dropdown-divider {
    width: 1px;
    height: 27px;
    background-color: #323232 !important;
  }

  #mobile-footer .mobile-footer-dropdown-arrow-box {
    width: 69px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #mobile-footer .mobile-footer-dropdown-arrow {
    width: 10px;
    height: 7px;
    color: #818181 !important;
    transition: transform 0.2s ease;
  }

  #mobile-footer .mobile-footer-dropdown-menu {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    right: 0;
    background-color: #1A1A1A !important;
    border: 1px solid #333333 !important;
    border-radius: 4px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5);
    z-index: 50;
    list-style: none;
    margin: 0;
    padding: 4px 0;
  }

  #mobile-footer .mobile-footer-dropdown-item {
    padding: 8px 14px;
    font-size: 13px;
    color: #CCCCCC !important;
    cursor: pointer;
    transition: background-color 0.15s, color 0.15s;
  }

  #mobile-footer .mobile-footer-dropdown-item:hover,
  #mobile-footer .mobile-footer-dropdown-item.active {
    background-color: #EC460B !important;
    color: #FFFFFF !important;
  }

  /* 4. Logo in • between */
  #mobile-footer .mobile-footer-logo-wrap {
    margin-top: 60px;
    display: flex;
    justify-content: center;
  }

  #mobile-footer .mobile-footer-logo-link {
    display: inline-block;
    transition: opacity 0.2s ease;
  }

  #mobile-footer .mobile-footer-logo-link:hover {
    opacity: 0.85;
  }

  #mobile-footer .mobile-footer-logo-svg {
    width: 263px;
    height: 41px;
    max-width: 100%;
    display: block;
  }

  /* 5. Contact Informations */
  #mobile-footer .mobile-footer-info-section {
    margin-top: 40px;
    text-align: left;
  }

  #mobile-footer .mobile-footer-section-label {
    font-size: 12px;
    font-weight: 400;
    color: #959595 !important;
    margin-bottom: 8px;
    letter-spacing: normal;
  }

  #mobile-footer .mobile-footer-info-line {
    font-size: 13.5px;
    font-weight: 400;
    color: #F6F2EF !important;
    line-height: 1.5;
  }

  #mobile-footer .mobile-footer-link {
    color: #F6F2EF !important;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  #mobile-footer .mobile-footer-link:hover {
    color: #EC460B !important;
  }

  /* 6. Quick Links */
  #mobile-footer .mobile-footer-links-section {
    margin-top: 38px;
    text-align: left;
  }

  #mobile-footer .mobile-footer-links-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 24px;
    row-gap: 12px;
    margin-top: 10px;
  }

  #mobile-footer .mobile-footer-links-col {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  #mobile-footer .mobile-footer-links-col .mobile-footer-link {
    font-size: 13.5px;
    font-weight: 400;
    color: #F6F2EF !important;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  #mobile-footer .mobile-footer-links-col .mobile-footer-link:hover {
    color: #EC460B !important;
  }

  /* 7. Community / Zalo Group */
  #mobile-footer .mobile-footer-community-section {
    margin-top: 39px;
    text-align: left;
  }

  #mobile-footer .mobile-footer-community-desc {
    margin: 0 0 14px 0;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.4;
    color: #F6F2EF !important;
    max-width: 340px;
  }

  #mobile-footer .mobile-footer-pill-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 26.5px;
    padding: 0 14px;
    border-radius: 9999px;
    border: 0.5px solid #FFFFFF !important;
    font-size: 11px;
    font-weight: 700;
    color: #FFFFFF !important;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    text-decoration: none;
    transition: all 0.2s ease;
    box-sizing: border-box;
  }

  #mobile-footer .mobile-footer-pill-btn:hover {
    background-color: #FFFFFF !important;
    color: #131313 !important;
  }

  #mobile-footer .mobile-footer-pill-arrow {
    width: 10px;
    height: 10px;
    flex-shrink: 0;
  }

  /* 8. Social Media Row */
  #mobile-footer .mobile-footer-social-section {
    margin-top: 36px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-align: left;
  }

  #mobile-footer .mobile-footer-social-text {
    font-size: 12px;
    font-weight: 400;
    color: #959595 !important;
    line-height: 1.25;
  }

  #mobile-footer .mobile-footer-social-icons {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  #mobile-footer .mobile-footer-social-icon-link {
    color: #FFFFFF !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s ease, transform 0.2s ease;
    text-decoration: none;
  }

  #mobile-footer .mobile-footer-social-icon-link:hover {
    color: #EC460B !important;
    transform: translateY(-1px);
  }

  #mobile-footer .mobile-footer-social-icon {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
  }

  /* 9. Copyright */
  #mobile-footer .mobile-footer-copyright-wrap {
    margin-top: 48px;
    text-align: center;
    font-size: 12px;
    font-weight: 400;
    color: #F6F2EF !important;
    line-height: 1.5;
  }

  #mobile-footer .mobile-footer-feedback-banner {
    padding: 10px 14px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 6px;
  }

  /* Slide animation for rotating words: smooth top-to-bottom without jitter */
  @keyframes mobileFooterSlideTopToBottomExit {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(100%); opacity: 0; }
  }
  @keyframes mobileFooterSlideTopToBottomEnter {
    0% { transform: translateY(-100%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }
  .mobile-footer-anim-down-out {
    animation: mobileFooterSlideTopToBottomExit 0.38s cubic-bezier(0.22, 1, 0.36, 1) forwards;
  }
  .mobile-footer-anim-down-in {
    animation: mobileFooterSlideTopToBottomEnter 0.38s cubic-bezier(0.22, 1, 0.36, 1) forwards;
  }
</style>

<script>
  (function () {
    // 1. Top-to-Bottom Rotating Text (1s interval)
    var wrapper = document.getElementById('mobile-footer-rotating-wrapper');
    if (wrapper && !wrapper.__initialized) {
      wrapper.__initialized = true;
      var wordsData = wrapper.getAttribute('data-words');
      var words = [];
      try {
        words = JSON.parse(wordsData);
      } catch (e) {
        words = ['CONNECTS', 'CONNECTIONS', 'OPPORTUNITIES', 'PARTNERSHIPS', 'NETWORKS', 'GROWTH', 'SOLUTIONS'];
      }

      if (words && words.length >= 2) {
        // Auto-measure maximum word width to lock wrapper width precisely and prevent layout shift
        function updateFixedWrapperWidth() {
          if (!wrapper) return;
          var measureSpan = document.createElement('span');
          measureSpan.style.visibility = 'hidden';
          measureSpan.style.position = 'absolute';
          measureSpan.style.whiteSpace = 'nowrap';
          measureSpan.style.fontWeight = '700';
          var compStyle = window.getComputedStyle(wrapper);
          measureSpan.style.fontSize = compStyle.fontSize;
          measureSpan.style.fontFamily = compStyle.fontFamily;
          measureSpan.style.letterSpacing = compStyle.letterSpacing;
          measureSpan.style.textTransform = compStyle.textTransform;
          document.body.appendChild(measureSpan);

          var maxW = 0;
          for (var i = 0; i < words.length; i++) {
            measureSpan.textContent = words[i];
            var w = measureSpan.getBoundingClientRect().width;
            if (w > maxW) maxW = w;
          }
          document.body.removeChild(measureSpan);

          if (maxW > 0) {
            var finalW = Math.ceil(maxW + 4);
            wrapper.style.width = finalW + 'px';
            wrapper.style.minWidth = finalW + 'px';
          }
        }

        updateFixedWrapperWidth();
        window.addEventListener('resize', updateFixedWrapperWidth);

        var currentIndex = 0;
        var currentEl = wrapper.querySelector('.mobile-footer-word-active');
        if (!currentEl) {
          currentEl = document.createElement('span');
          currentEl.className = 'mobile-footer-word-active';
          currentEl.textContent = words[0];
          wrapper.appendChild(currentEl);
        }

        function rotateNextWord() {
          var nextIndex = (currentIndex + 1) % words.length;
          var nextWord = words[nextIndex];

          var incomingEl = document.createElement('span');
          incomingEl.className = 'mobile-footer-word-incoming mobile-footer-anim-down-in';
          incomingEl.textContent = nextWord;
          wrapper.appendChild(incomingEl);

          currentEl.classList.remove('mobile-footer-word-active');
          currentEl.classList.add('mobile-footer-anim-down-out');

          setTimeout(function () {
            if (currentEl && currentEl.parentNode) {
              currentEl.remove();
            }
            incomingEl.classList.remove('mobile-footer-anim-down-in', 'mobile-footer-word-incoming');
            incomingEl.classList.add('mobile-footer-word-active');
            currentEl = incomingEl;
            currentIndex = nextIndex;
          }, 380);
        }

        var timer = setInterval(rotateNextWord, 1000);
        document.addEventListener('visibilitychange', function () {
          if (document.hidden) {
            clearInterval(timer);
          } else {
            clearInterval(timer);
            timer = setInterval(rotateNextWord, 1000);
          }
        });
      }
    }

    // 2. Custom Select Dropdown
    var dropdownBox = document.getElementById('mobile-service-dropdown');
    if (dropdownBox && !dropdownBox.__attached) {
      dropdownBox.__attached = true;
      var trigger = document.getElementById('mobile-service-trigger');
      var label = document.getElementById('mobile-service-label');
      var arrow = document.getElementById('mobile-service-arrow');
      var menu = document.getElementById('mobile-service-options');
      var hiddenInput = document.getElementById('mobile-service-val');

      function toggleMenu(open) {
        var isOpen = typeof open === 'boolean' ? open : (menu.style.display !== 'none');
        if (!isOpen) {
          menu.style.display = 'block';
          if (arrow) arrow.style.transform = 'rotate(180deg)';
          trigger.setAttribute('aria-expanded', 'true');
        } else {
          menu.style.display = 'none';
          if (arrow) arrow.style.transform = '';
          trigger.setAttribute('aria-expanded', 'false');
        }
      }

      trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleMenu();
      });

      menu.querySelectorAll('.mobile-footer-dropdown-item').forEach(function (opt) {
        opt.addEventListener('click', function (e) {
          e.stopPropagation();
          var val = this.getAttribute('data-value');
          var text = this.textContent.trim();
          if (hiddenInput) hiddenInput.value = val;
          if (label) label.textContent = text;
          menu.querySelectorAll('.mobile-footer-dropdown-item').forEach(function (it) {
            it.classList.remove('active');
          });
          this.classList.add('active');
          toggleMenu(true); // close
        });
      });

      document.addEventListener('click', function (e) {
        if (!dropdownBox.contains(e.target)) {
          menu.style.display = 'none';
          if (arrow) arrow.style.transform = '';
          trigger.setAttribute('aria-expanded', 'false');
        }
      });
    }

    // 3. Contact Form Submission
    var form = document.getElementById('mobile-footer-contact-form');
    if (form && !form.__ajaxAttached) {
      form.__ajaxAttached = true;
      var feedback = document.getElementById('mobile-footer-feedback');

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var fullname = form.querySelector('input[name="fullname"]')?.value.trim();
        var phone = form.querySelector('input[name="phone"]')?.value.trim();

        if (!fullname || !phone) {
          if (feedback) {
            feedback.style.display = 'block';
            feedback.style.backgroundColor = 'rgba(136, 19, 55, 0.8)';
            feedback.style.border = '1px solid rgba(244, 63, 94, 0.5)';
            feedback.style.color = '#fecdd3';
            feedback.textContent = 'Please fill in both Full Name and Phone Number!';
          } else {
            alert('Please fill in both Full Name and Phone Number!');
          }
          return;
        }

        var formData = new FormData(form);
        fetch(form.action, {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(function (res) {
          return res.json().catch(function () {
            return { success: res.ok };
          });
        })
        .then(function (data) {
          var msg = (data && data.message) ? data.message : 'Thank you! Your inquiry has been sent successfully.';
          if (feedback) {
            feedback.style.display = 'block';
            feedback.style.backgroundColor = 'rgba(6, 78, 59, 0.8)';
            feedback.style.border = '1px solid rgba(16, 185, 129, 0.5)';
            feedback.style.color = '#a7f3d0';
            feedback.textContent = msg;
            setTimeout(function () {
              feedback.style.display = 'none';
            }, 5000);
          } else {
            alert(msg);
          }
          form.reset();
        })
        .catch(function () {
          if (feedback) {
            feedback.style.display = 'block';
            feedback.style.backgroundColor = 'rgba(6, 78, 59, 0.8)';
            feedback.style.border = '1px solid rgba(16, 185, 129, 0.5)';
            feedback.style.color = '#a7f3d0';
            feedback.textContent = 'Thank you! Your inquiry has been sent successfully.';
            feedback.classList.remove('hidden');
          }
          form.reset();
        });
      });
    }
  })();
</script>
