{!! '<'.'?xml version="1.0" encoding="UTF-8"'.'?'.'>' !!}
{!! '<'.'?xml-stylesheet type="text/xsl" href="' . url('sitemap.xsl') . '"'.'?'.'>' !!}
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($sitemaps as $sitemap)
    <sitemap>
        <loc>{{ $sitemap['url'] }}</loc>
        @if($sitemap['lastmod'])
        <lastmod>{{ $sitemap['lastmod']->toAtomString() }}</lastmod>
        @endif
    </sitemap>
    @endforeach
</sitemapindex>
