{!! '<'.'?xml version="1.0" encoding="UTF-8"'.'?'.'>' !!}
{!! '<'.'?xml-stylesheet type="text/xsl" href="' . url('sitemap.xsl') . '"'.'?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categories as $cat)
    <url>
        <loc>{{ locale_route('shop.category', $cat->slug) }}</loc>
        <lastmod>{{ $cat->updated_at->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>

