<?php

function extractHighlights($file) {
    $zip = new ZipArchive;
    if ($zip->open($file) === TRUE) {
        $xml = $zip->getFromName('word/document.xml');
        $zip->close();

        // Regex to find <w:r> containing <w:highlight w:val="yellow"/> and extract <w:t>
        $pattern = '/<w:r\b[^>]*>(?=.*<w:highlight\b[^>]*w:val="yellow"[^>]*>).*?<w:t[^>]*>(.*?)<\/w:t>.*?<\/w:r>/s';
        
        // This regex is a bit simplistic since <w:highlight> is inside <w:rPr> which is inside <w:r>.
        // Let's use simple string manipulation or DOMDocument.
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
        
        $highlights = $xpath->query('//w:r[w:rPr/w:highlight[@w:val="yellow"]]//w:t');
        
        $results = [];
        foreach ($highlights as $node) {
            $results[] = $node->nodeValue;
        }
        
        return $results;
    }
    return [];
}

$files = glob(__DIR__ . '/public/*.doc*');
foreach ($files as $f) {
    echo "File: " . basename($f) . "\n";
    $highlights = extractHighlights($f);
    print_r(array_unique($highlights));
    echo "--------------------------\n";
}
