{!! '<'.'?xml version="1.0" encoding="UTF-8"'.'?'.'>' !!}
{!! '<'.'?xml-stylesheet type="text/xsl" href="' . url('sitemap.xsl') . '"'.'?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($products as $product)
    <url>
        <loc>{{ locale_route('shop.show', $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach
</urlset>

