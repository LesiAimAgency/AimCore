{!! '<'.'?xml version="1.0" encoding="UTF-8"'.'?'.'>' !!}
{!! '<'.'?xml-stylesheet type="text/xsl" href="' . url('sitemap.xsl') . '"'.'?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($pages as $page)
    <url>
        <loc>{{ locale_route('pages.show', ['slug' => $page->slug]) }}</loc>
        <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
</urlset>
