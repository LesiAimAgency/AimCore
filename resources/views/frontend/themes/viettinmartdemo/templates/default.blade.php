<div class="rts-page-detail-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content-wrapper p-4 border rounded bg-white shadow-sm">
                    <h1 class="title mb--30">{{ $page->title ?? 'Untitled Page' }}</h1>
                    
                    {{-- Table of Contents --}}
                    @if(setting('toc_enabled', true))
                        <div id="vtm-toc-container" style="display:none;" class="mb--40 p-4 bg_light-1 rounded">
                            <h5 class="title mb--15" style="font-size:16px;font-weight:700;">
                                {{ setting('toc_title', 'Mục lục') }}
                            </h5>
                            <ul id="vtm-toc-list" class="list-unstyled mb-0" style="padding-left:0;"></ul>
                        </div>
                    @endif
                    
                    <div class="content entry-content">
                        {!! $page->content ?? 'No content available for this page.' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(setting('toc_enabled', true))
@push('scripts')
<script>
(function () {
    const minH = {{ (int) setting('toc_min_headings', 3) }};
    const tags = '{{ setting('toc_heading_tags', 'h2,h3') }}'.split(',').map(t => t.trim()).filter(Boolean);
    const content = document.querySelector('.entry-content');
    if (!content) return;

    const headings = content.querySelectorAll(tags.join(','));
    if (headings.length < minH) return;

    const list = document.getElementById('vtm-toc-list');
    headings.forEach(function (h, i) {
        if (!h.id) h.id = 'toc-heading-' + i;
        const li = document.createElement('li');
        li.style.paddingLeft = h.tagName === 'H3' ? '16px' : '0';
        li.style.marginBottom = '6px';
        li.innerHTML = '<a href="#' + h.id + '" style="color:var(--color-primary);text-decoration:none;font-size:14px;">'
            + (h.tagName === 'H3' ? '↳ ' : '') + h.textContent + '</a>';
        list.appendChild(li);
    });

    document.getElementById('vtm-toc-container').style.display = 'block';
})();
</script>
@endpush
@endif

<style>
.entry-content p {
    margin-bottom: 20px;
}
.entry-content ul, .entry-content ol {
    margin-bottom: 20px;
    padding-left: 20px;
}
.entry-content h2, .entry-content h3 {
    margin-top: 30px;
    margin-bottom: 15px;
}
</style>
