@php
    $footerMenus = \App\Services\MenuService::getMenusByLocation('footer');
    $footerBottomMenus = \App\Services\MenuService::getMenusByLocation('footer_bottom');

    // Fallback if footer_bottom is stored as a menu with slug containing 'bottom' in location 'footer'
    if ($footerBottomMenus->isEmpty()) {
        $footerBottomMenus = $footerMenus->filter(fn($m) => str_contains($m->slug, 'bottom') || str_contains($m->slug, 'policy'));
        $footerMainMenus = $footerMenus->reject(fn($m) => str_contains($m->slug, 'bottom') || str_contains($m->slug, 'policy'));
    } else {
        $footerMainMenus = $footerMenus;
    }

    $siteName = setting('site_name', 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách. Hoàn toàn miễn phí.');
    $siteCopyright = setting('site_copyright', 'Email: hi@ehenho.com');
    $facebookUrl = setting('social_facebook', 'http://www.facebook.com/ehenho');
    $twitterUrl = setting('social_twitter', 'http://www.twitter.com/ehenho');
@endphp

<footer class="footer bs-docs-footer" role="contentinfo">
  <div class="container footer-cont">
    @if($footerMainMenus->isNotEmpty())
      <div style="line-height:2.4em">
        @foreach($footerMainMenus as $menuIndex => $menu)
          @if($menuIndex > 0)
            <hr>
          @endif
          <p>
            @foreach($menu->items as $item)
              @php
                $itemClass = $item->css_class ?: 't-button';
              @endphp
              <a class="{{ $itemClass }}" href="{{ $item->url }}" target="{{ $item->target ?? '_self' }}">
                @if($item->icon)
                  <i class="{{ $item->icon }}" aria-hidden="true"></i>
                @endif
                &nbsp;{{ $item->title }}&nbsp;
              </a>
            @endforeach
          </p>
        @endforeach
      </div>
    @endif

    @if($footerBottomMenus->isNotEmpty())
      <br><br>
      <hr>
      <div style="font-size:1.0em">
        @foreach($footerBottomMenus as $bMenu)
          @foreach($bMenu->items as $bItem)
            <a class="{{ $bItem->css_class ?: 'navlink-b' }}" href="{{ $bItem->url }}" target="{{ $bItem->target ?? '_self' }}">&nbsp;{{ $bItem->title }}</a>
          @endforeach
        @endforeach
      </div>
    @endif
  </div>	

  <div class="container footer-cont">
    @if($facebookUrl)
      <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer"> <i class="fa fa-br fa-facebook"></i></a>&nbsp;&nbsp;
    @endif
    @if($twitterUrl)
      <a href="{{ $twitterUrl }}" target="_blank" rel="noopener noreferrer"> <i class="fa fa-br fa-twitter"></i></a>
    @endif
  </div>

  <div class="container footer-cont">	 
    <span class="footer-note">{!! strip_tags($siteName, '<a><b><strong><span>') !!}</span><br>
    <span class="footer-note">{!! strip_tags($siteCopyright, '<a><b><strong><span>') !!}</span><br>
  </div>
</footer>
