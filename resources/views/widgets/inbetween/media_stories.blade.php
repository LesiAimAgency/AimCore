@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
  $manualStories = !empty($settings['manual_stories']) && is_array($settings['manual_stories']) ? $settings['manual_stories'] : null;

  if ($manualStories) {
      $displayPosts = $manualStories;
  } else {
      $displayPosts = count($posts) ? $posts : [
        [
            'title' => 'HÃY ĐỂ VIỆT NAM ĐƯỢC LÀ VIỆT NAM',
            'author_name' => 'Ken',
            'description' => 'Lắng nghe những góc nhìn sâu sắc của Ken về bản sắc văn hóa Việt Nam, tiềm năng phát triển và cơ hội kết nối cộng đồng sáng tạo quốc tế.',
            'image' => asset('themes/inbetween/assets/story-1.png'),
            'url' => '#'
        ],
        [
            'title' => 'VIỆT NAM KHIẾN TÔI TRÂN TRỌNG HƠN NHỮNG MỐI QUAN HỆ LÂU DÀI',
            'author_name' => 'Hayo Jongejans',
            'description' => 'Hayo Jongejans chia sẻ về hành trình xây dựng các mối quan hệ bền vững và giá trị của sự tin cậy trong môi trường kinh doanh tại Việt Nam.',
            'image' => asset('themes/inbetween/assets/story-2.png'),
            'url' => '#'
        ],
        [
            'title' => 'CƠ HỘI NÀO CHO NHỮNG NHÀ SÁNG TẠO TRẺ TẠI VIỆT NAM?',
            'author_name' => 'Thảo Nguyễn',
            'description' => 'Khám phá những cơ hội và thách thức mà thế hệ trẻ đang đối mặt trên con đường xây dựng sự nghiệp sáng tạo tại Việt Nam.',
            'image' => asset('themes/inbetween/assets/story-3.png'),
            'url' => '#'
        ],
        [
            'title' => 'GIAO THOA VĂN HÓA TRONG KỶ NGUYÊN SỐ',
            'author_name' => 'David Trần',
            'description' => 'Góc nhìn về sự kết hợp giữa truyền thống và công nghệ hiện đại trong các dự án văn hóa tại Việt Nam và khu vực.',
            'image' => asset('themes/inbetween/assets/story-4.png'),
            'url' => '#'
        ]
      ];
  }
@endphp

<!-- =======================================================================
     SECTION 6: STORIES (Exact 1:1 from 6.svg / Frame 107)
     ======================================================================= -->
<section id="media" class="relative w-full bg-[#F9F9F9] text-black min-h-screen overflow-hidden py-12 flex flex-col justify-center">
  <div class="container-custom">

    <!-- Header: 3-column flex from Frame 107 -->
    <div id="stories-header" class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start mb-16 lg:mb-20 pb-8 border-b border-neutral-200">

      <!-- Left: Hear the STORIES -->
      <div class="md:col-span-5 lg:col-span-4">
        <h2 class="text-3xl sm:text-4xl lg:text-[38px] font-bold text-black leading-none m-0">
          {!! str_replace('STORIES', '', $settings['title']) !!}
        </h2>
        <div class="text-4xl sm:text-5xl lg:text-[62px] font-serif font-bold text-[#EC460B] uppercase leading-none tracking-tight mt-1.5">
          STORIES
        </div>
      </div>

      <!-- Middle: Description & Be our guest -->
      <div class="md:col-span-4 lg:col-span-5 flex flex-col items-start pt-2">
        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed max-w-sm m-0">
          {{ $settings['subtitle'] }}
        </p>
        <a href="{{ $settings['btn_link'] }}" class="inline-flex items-center gap-2 border-b border-black pb-1 text-xs font-bold uppercase tracking-widest hover:text-[#EC460B] hover:border-[#EC460B] transition-colors mt-4">
          {{ $settings['btn_text'] }} <span>→</span>
        </a>
      </div>

      <!-- Right: Explore more on Socials -->
      <div class="md:col-span-3 flex flex-col items-start md:items-end pt-2">
        <span class="text-xs font-medium text-neutral-600 mb-3 block">Explore more content on</span>
        <div class="flex items-center gap-3">
          <a href="#" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center">
            <img src="{{ asset('themes/inbetween/assets/social4.svg') }}" alt="Facebook" class="w-6 h-6">
          </a>
          <a href="#" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center">
            <img src="{{ asset('themes/inbetween/assets/social5.svg') }}" alt="Instagram" class="w-6 h-6">
          </a>
          <a href="#" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center">
            <img src="{{ asset('themes/inbetween/assets/social6.svg') }}" alt="LinkedIn" class="w-6 h-6">
          </a>
          <a href="#" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center">
            <img src="{{ asset('themes/inbetween/assets/social7.svg') }}" alt="TikTok" class="w-6 h-6">
          </a>
        </div>
      </div>

    </div>

    <!-- 4 Story Cards (Staggered: Số lẻ 1 & 3 ở trên, Số chẵn 2 & 4 ở dưới) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 items-start">
      
      @foreach($displayPosts as $index => $post)
      @php
        $img = is_array($post) ? (isset($post['image']) && strpos($post['image'], 'http') !== false ? $post['image'] : \RvMedia::getImageUrl($post['image'] ?? '')) : (isset($post->image) ? get_image_url($post->image) : asset('themes/inbetween/assets/story-'.(($index%4)+1).'.png'));
        if (empty($img)) $img = asset('themes/inbetween/assets/story-'.(($index%4)+1).'.png');
        
        $title = is_array($post) ? ($post['title'] ?? '') : ($post->name ?? '');
        $authorName = is_array($post) ? ($post['author_name'] ?? 'Guest') : ($post->author->name ?? 'Guest');
        $desc = is_array($post) ? ($post['description'] ?? '') : ($post->description ?? '');
        $url = is_array($post) ? ($post['url'] ?? '#') : ($post->url ?? '#');
        
        $isEven = ($index + 1) % 2 === 0;
      @endphp

      <article class="story-card {{ $isEven ? 'story-stagger-down lg:mt-24' : '' }} group flex flex-col">
        <a href="{{ $url }}" class="aspect-[297/450] rounded-[22px] overflow-hidden bg-neutral-200 shadow-sm mb-4 block">
          <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        </a>
        <h3 class="text-sm sm:text-base font-bold text-black group-hover:text-[#EC460B] transition-colors leading-snug m-0 uppercase mb-3 min-h-[44px]">
          <a href="{{ $url }}">{{ $title }}</a>
        </h3>
        <div class="story-toggle-bar flex items-center justify-between pt-1 cursor-pointer select-none" onclick="toggleStoryCard(this)">
          <div class="flex items-center gap-2 pointer-events-none">
            <span class="border border-black rounded-full px-3 py-0.5 text-xs font-semibold text-black">Guest</span>
            <span class="text-sm font-bold text-black">{{ $authorName }}</span>
          </div>
          <button type="button" class="story-toggle-btn p-1.5 rounded-full hover:bg-neutral-200 transition-colors focus:outline-none flex items-center justify-center pointer-events-none" aria-label="Toggle Story Info">
            <svg class="w-4 h-4 text-black story-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
        </div>
        <!-- Collapsible Drawer (Grid Accordion) -->
        <div class="story-drawer text-xs text-neutral-600 leading-relaxed font-normal">
          <div class="story-drawer-inner">
            <p class="pt-2.5 border-t border-neutral-200 m-0">
              {{ $desc }}
            </p>
          </div>
        </div>
      </article>
      @endforeach

    </div>
  </div>
</section>
