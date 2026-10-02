<?php

/**
 * Phase 3 Comprehensive Scan & Analysis Script
 * Language: PHP 8.2 (Laravel Framework Environment)
 */

declare(strict_types=1);

$rootDir = realpath(__DIR__ . '/..');
$htmlDir = $rootDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'e-henho';
$dataDir = $rootDir . DIRECTORY_SEPARATOR . 'data';
$docsDir = $rootDir . DIRECTORY_SEPARATOR . 'docs';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}
if (!is_dir($docsDir)) {
    mkdir($docsDir, 0755, true);
}

echo "=== PHASE 3 SCAN: STARTING COMPREHENSIVE AUDIT ===\n";
echo "Root Dir: $rootDir\n";
echo "HTML Dir: $htmlDir\n\n";

// =========================================================================
// 1. SCAN 22 HTML FILES
// =========================================================================
$htmlFiles = glob($htmlDir . DIRECTORY_SEPARATOR . '*.html');
sort($htmlFiles);
echo "1. Discovered " . count($htmlFiles) . " HTML files in public/e-henho\n";

$pageInventory = [];
$allReferencedImages = [];
$allReferencedCss = [];
$allReferencedJs = [];
$allForms = [];
$allInteractive = [];
$classifications = [];
$templateGroups = [];
$componentUsage = [];

foreach ($htmlFiles as $filePath) {
    $fileName = basename($filePath);
    $content = file_get_contents($filePath);
    $sizeBytes = strlen($content);
    $fingerprint = md5($content);

    // Parse with DOMDocument
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();

    // Extract Title
    $titleNodes = $dom->getElementsByTagName('title');
    $title = $titleNodes->length > 0 ? trim($titleNodes->item(0)->textContent) : '';

    // Extract Meta tags
    $metaTags = [];
    $metaNodes = $dom->getElementsByTagName('meta');
    foreach ($metaNodes as $meta) {
        $item = [];
        foreach ($meta->attributes as $attr) {
            $item[$attr->name] = $attr->value;
        }
        $metaTags[] = $item;
    }

    // Extract CSS links
    $cssLinks = [];
    $linkNodes = $dom->getElementsByTagName('link');
    foreach ($linkNodes as $link) {
        $rel = $link->getAttribute('rel');
        $href = $link->getAttribute('href');
        if (str_contains($rel, 'stylesheet') || str_contains($rel, 'icon')) {
            $cssLinks[] = [
                'rel' => $rel,
                'href' => $href,
                'is_external' => str_starts_with($href, 'http') || str_starts_with($href, '//')
            ];
            $allReferencedCss[$href] = ($allReferencedCss[$href] ?? 0) + 1;
        }
    }

    // Extract JS scripts
    $jsScripts = [];
    $inlineScripts = [];
    $scriptNodes = $dom->getElementsByTagName('script');
    foreach ($scriptNodes as $script) {
        $src = $script->getAttribute('src');
        if (!empty($src)) {
            $jsScripts[] = [
                'src' => $src,
                'is_external' => str_starts_with($src, 'http') || str_starts_with($src, '//')
            ];
            $allReferencedJs[$src] = ($allReferencedJs[$src] ?? 0) + 1;
        } else {
            $inline = trim($script->textContent);
            if (!empty($inline)) {
                $inlineScripts[] = substr($inline, 0, 300); // snippet
            }
        }
    }

    // Extract Images
    $images = [];
    $imgNodes = $dom->getElementsByTagName('img');
    foreach ($imgNodes as $img) {
        $src = $img->getAttribute('src');
        if (!empty($src)) {
            $images[] = $src;
            $allReferencedImages[$src] = ($allReferencedImages[$src] ?? 0) + 1;
        }
    }

    // Extract Forms & Inputs
    $forms = [];
    $formNodes = $dom->getElementsByTagName('form');
    foreach ($formNodes as $form) {
        $action = $form->getAttribute('action');
        $method = strtoupper($form->getAttribute('method') ?: 'GET');
        $formId = $form->getAttribute('id');
        $formClass = $form->getAttribute('class');

        $inputs = [];
        $subInputs = $form->getElementsByTagName('input');
        foreach ($subInputs as $inp) {
            $inputs[] = [
                'type' => $inp->getAttribute('type') ?: 'text',
                'name' => $inp->getAttribute('name'),
                'id' => $inp->getAttribute('id'),
                'placeholder' => $inp->getAttribute('placeholder'),
                'required' => $inp->hasAttribute('required')
            ];
        }
        $subSelects = $form->getElementsByTagName('select');
        foreach ($subSelects as $sel) {
            $inputs[] = [
                'type' => 'select',
                'name' => $sel->getAttribute('name'),
                'id' => $sel->getAttribute('id'),
                'required' => $sel->hasAttribute('required')
            ];
        }
        $subTextareas = $form->getElementsByTagName('textarea');
        foreach ($subTextareas as $ta) {
            $inputs[] = [
                'type' => 'textarea',
                'name' => $ta->getAttribute('name'),
                'id' => $ta->getAttribute('id'),
                'required' => $ta->hasAttribute('required')
            ];
        }

        $forms[] = [
            'action' => $action,
            'method' => $method,
            'id' => $formId,
            'class' => $formClass,
            'inputs' => $inputs
        ];
    }

    // Extract Interactive Elements (modals, dropdowns, collapse, tabs)
    $interactive = [];
    $xpath = new DOMXPath($dom);
    $dataToggleElements = $xpath->query('//*[@data-toggle]');
    foreach ($dataToggleElements as $el) {
        $interactive[] = [
            'tag' => $el->nodeName,
            'type' => $el->getAttribute('data-toggle'),
            'target' => $el->getAttribute('data-target') ?: $el->getAttribute('href'),
            'id' => $el->getAttribute('id'),
            'class' => $el->getAttribute('class')
        ];
    }

    // Detect structural sections & components
    $componentsFound = [];
    if (str_contains($content, 'navbar-inverse') || str_contains($content, 'bs-docs-nav') || $dom->getElementsByTagName('header')->length > 0) {
        $componentsFound[] = 'header-navbar';
        $componentUsage['header-navbar'][] = $fileName;
    }
    if (str_contains($content, 'footer-cont') || str_contains($content, 'footer-note') || $dom->getElementsByTagName('footer')->length > 0) {
        $componentsFound[] = 'footer-main';
        $componentUsage['footer-main'][] = $fileName;
    }
    if (str_contains($content, 'list-group') || str_contains($content, 'profile-menu') || str_contains($content, 'nav-stacked')) {
        $componentsFound[] = 'account-sidebar-menu';
        $componentUsage['account-sidebar-menu'][] = $fileName;
    }
    if (str_contains($content, 'profile_box') || str_contains($content, 'profile-card') || str_contains($content, 'c-img-avatar') || str_contains($content, 'p-info')) {
        $componentsFound[] = 'profile-card';
        $componentUsage['profile-card'][] = $fileName;
    }
    if (str_contains($content, 'carousel') || str_contains($content, 'carousel-inner')) {
        $componentsFound[] = 'hero-carousel';
        $componentUsage['hero-carousel'][] = $fileName;
    }
    if (str_contains($content, 'pagination') || str_contains($content, 'pager')) {
        $componentsFound[] = 'pagination-controls';
        $componentUsage['pagination-controls'][] = $fileName;
    }
    if (str_contains($content, 'modal fade') || str_contains($content, 'modal-dialog')) {
        $componentsFound[] = 'modal-dialog';
        $componentUsage['modal-dialog'][] = $fileName;
    }
    if (str_contains($content, 'msg-row') || str_contains($content, 'table-message') || str_contains($content, 'inbox-item') || str_contains($content, 'message-view')) {
        $componentsFound[] = 'message-row-item';
        $componentUsage['message-row-item'][] = $fileName;
    }
    if (str_contains($content, 'search-box') || str_contains($content, 'form-search') || str_contains($content, 'tim-kiem')) {
        $componentsFound[] = 'search-filter-box';
        $componentUsage['search-filter-box'][] = $fileName;
    }
    if (str_contains($content, 'mask-pw') || str_contains($content, 'c-password')) {
        $componentsFound[] = 'password-toggle-widget';
        $componentUsage['password-toggle-widget'][] = $fileName;
    }

    // Determine Classification & Layout
    $pageType = 'unknown';
    $template = 'standard';
    $layout = 'app';
    $laravelRoute = '';
    $laravelController = '';
    $laravelModel = '';

    switch ($fileName) {
        case 'index.html':
            $pageType = 'homepage';
            $template = 'theme-landing';
            $layout = 'layouts.frontend';
            $laravelRoute = 'GET /';
            $laravelController = 'HomeController@index';
            $laravelModel = 'Profile, Post, Setting';
            break;

        case 'login.html':
            $pageType = 'auth';
            $template = 'auth-login';
            $layout = 'layouts.auth';
            $laravelRoute = 'GET /login';
            $laravelController = 'AuthController@showLoginForm';
            $laravelModel = 'User';
            break;

        case 'signup.html':
            $pageType = 'auth';
            $template = 'auth-register';
            $layout = 'layouts.auth';
            $laravelRoute = 'GET /register';
            $laravelController = 'AuthController@showRegisterForm';
            $laravelModel = 'User, Profile';
            break;

        case 'logout.html':
            $pageType = 'auth';
            $template = 'auth-logout';
            $layout = 'layouts.auth';
            $laravelRoute = 'POST /logout';
            $laravelController = 'AuthController@logout';
            $laravelModel = 'User';
            break;

        case 'password-reset.html':
            $pageType = 'auth';
            $template = 'auth-password-reset';
            $layout = 'layouts.auth';
            $laravelRoute = 'GET /password/reset';
            $laravelController = 'ForgotPasswordController@showLinkRequestForm';
            $laravelModel = 'User';
            break;

        case 'password-change.html':
            $pageType = 'account';
            $template = 'account-password-change';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/password';
            $laravelController = 'AccountController@changePassword';
            $laravelModel = 'User';
            break;

        case 'profile-detail.html':
            $pageType = 'profile';
            $template = 'profile-detail';
            $layout = 'layouts.frontend';
            $laravelRoute = 'GET /profile/{id}';
            $laravelController = 'ProfileController@show';
            $laravelModel = 'Profile, User, Media';
            break;

        case 'my-profile.html':
            $pageType = 'profile';
            $template = 'profile-my-view';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/profile';
            $laravelController = 'ProfileController@myProfile';
            $laravelModel = 'Profile, User';
            break;

        case 'profile-edit.html':
            $pageType = 'profile';
            $template = 'profile-edit';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/profile/edit';
            $laravelController = 'ProfileController@edit';
            $laravelModel = 'Profile, User';
            break;

        case 'profile-options.html':
            $pageType = 'account';
            $template = 'account-settings';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/settings';
            $laravelController = 'AccountController@settings';
            $laravelModel = 'UserSetting, User';
            break;

        case 'upload-profile-pic.html':
            $pageType = 'profile';
            $template = 'profile-avatar-upload';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/avatar';
            $laravelController = 'ProfileController@avatarUpload';
            $laravelModel = 'Profile, Media';
            break;

        case 'inbox.html':
            $pageType = 'messaging';
            $template = 'messages-inbox';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /messages/inbox';
            $laravelController = 'MessageController@inbox';
            $laravelModel = 'Message, Conversation, User';
            break;

        case 'sent.html':
            $pageType = 'messaging';
            $template = 'messages-sent';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /messages/sent';
            $laravelController = 'MessageController@sent';
            $laravelModel = 'Message, Conversation, User';
            break;

        case 'message-view.html':
            $pageType = 'messaging';
            $template = 'messages-thread-view';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /messages/{conversationId}';
            $laravelController = 'MessageController@show';
            $laravelModel = 'Message, Conversation, User';
            break;

        case 'blocked-profiles.html':
            $pageType = 'social';
            $template = 'social-profile-list';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /social/blocked';
            $laravelController = 'SocialController@blocked';
            $laravelModel = 'UserBlock, Profile';
            break;

        case 'bookmarked-profiles.html':
            $pageType = 'social';
            $template = 'social-profile-list';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /social/bookmarks';
            $laravelController = 'SocialController@bookmarks';
            $laravelModel = 'UserBookmark, Profile';
            break;

        case 'liked-profiles.html':
            $pageType = 'social';
            $template = 'social-profile-list';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /social/likes';
            $laravelController = 'SocialController@likes';
            $laravelModel = 'UserLike, Profile';
            break;

        case 'contactbook-profiles.html':
            $pageType = 'social';
            $template = 'social-profile-list';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /social/contacts';
            $laravelController = 'SocialController@contacts';
            $laravelModel = 'UserContact, Profile';
            break;

        case 'tim-ban-bon-phuong.html':
            $pageType = 'search';
            $template = 'search-directory';
            $layout = 'layouts.frontend';
            $laravelRoute = 'GET /search';
            $laravelController = 'SearchController@index';
            $laravelModel = 'Profile, Province';
            break;

        case 'tim-ban-bon-phuong-theo-tuoi.html':
            $pageType = 'search';
            $template = 'search-directory';
            $layout = 'layouts.frontend';
            $laravelRoute = 'GET /search/age/{range?}';
            $laravelController = 'SearchController@byAge';
            $laravelModel = 'Profile, Province';
            break;

        case 'email-manager.html':
            $pageType = 'account';
            $template = 'account-email-manager';
            $layout = 'layouts.account';
            $laravelRoute = 'GET /account/emails';
            $laravelController = 'AccountController@emails';
            $laravelModel = 'UserEmail, User';
            break;

        case 'gioi-thieu.html':
            $pageType = 'static-content';
            $template = 'page-content';
            $layout = 'layouts.frontend';
            $laravelRoute = 'GET /gioi-thieu';
            $laravelController = 'PageController@show';
            $laravelModel = 'Page';
            break;
    }

    $templateGroups[$template][] = $fileName;

    $pageRecord = [
        'file' => $fileName,
        'title' => $title,
        'url' => '/' . ($fileName === 'index.html' ? '' : str_replace('.html', '', $fileName)),
        'page_type' => $pageType,
        'template' => $template,
        'layout' => $layout,
        'components' => array_values(array_unique($componentsFound)),
        'assets' => [
            'css' => $cssLinks,
            'js' => $jsScripts,
            'images_count' => count($images),
            'images' => array_values(array_unique($images))
        ],
        'css_files' => array_column($cssLinks, 'href'),
        'js_files' => array_column($jsScripts, 'src'),
        'forms' => $forms,
        'interactive_elements' => $interactive,
        'external_dependencies' => array_values(array_filter(array_merge(
            array_column($cssLinks, 'href'),
            array_column($jsScripts, 'src')
        ), fn($u) => str_starts_with($u, 'http') || str_starts_with($u, '//'))),
        'size_bytes' => $sizeBytes,
        'fingerprint' => $fingerprint,
        'laravel_mapping' => [
            'route' => $laravelRoute,
            'controller' => $laravelController,
            'model' => $laravelModel,
            'blade_view' => 'themes.ehenho.' . str_replace('-', '_', str_replace('.html', '', $fileName))
        ]
    ];

    $pageInventory[] = $pageRecord;
}

file_put_contents($dataDir . '/page-inventory.json', json_encode($pageInventory, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/page-inventory.json (" . count($pageInventory) . " pages)\n";

// =========================================================================
// 2. TEMPLATE MATRIX
// =========================================================================
$templateMatrix = [
    'total_pages' => count($htmlFiles),
    'unique_templates' => count($templateGroups),
    'templates' => []
];

foreach ($templateGroups as $tplName => $pages) {
    $layout = 'layouts.frontend';
    if (str_starts_with($tplName, 'auth-')) {
        $layout = 'layouts.auth';
    } elseif (str_starts_with($tplName, 'account-') || str_starts_with($tplName, 'messages-') || str_starts_with($tplName, 'social-')) {
        $layout = 'layouts.account';
    }

    $templateMatrix['templates'][] = [
        'template' => $tplName,
        'pages_count' => count($pages),
        'pages' => $pages,
        'layout' => $layout,
        'blade_target' => 'resources/views/themes/ehenho/pages/' . $tplName . '.blade.php'
    ];
}

file_put_contents($dataDir . '/template-matrix.json', json_encode($templateMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/template-matrix.json (" . count($templateMatrix['templates']) . " unique templates)\n";

// =========================================================================
// 3. COMPONENT MATRIX
// =========================================================================
$componentMatrix = [
    'components' => [
        [
            'name' => 'header-navbar',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/header.blade.php',
            'pages_count' => count($componentUsage['header-navbar'] ?? []),
            'pages' => $componentUsage['header-navbar'] ?? [],
            'dependencies' => ['bootstrap.css', 'base8.css', 'jquery.js', 'bootstrap.js', 'auth-session.js'],
            'dynamic_slots' => ['auth_user', 'unread_messages_count', 'logo_url']
        ],
        [
            'name' => 'footer-main',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/footer.blade.php',
            'pages_count' => count($componentUsage['footer-main'] ?? []),
            'pages' => $componentUsage['footer-main'] ?? [],
            'dependencies' => ['font-awesome', 'base8.css'],
            'dynamic_slots' => ['site_name', 'contact_email', 'social_links', 'copyright_year']
        ],
        [
            'name' => 'account-sidebar-menu',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/account-sidebar.blade.php',
            'pages_count' => count($componentUsage['account-sidebar-menu'] ?? []),
            'pages' => $componentUsage['account-sidebar-menu'] ?? [],
            'dependencies' => ['base8.css'],
            'dynamic_slots' => ['active_menu', 'profile_completion_percentage', 'unread_inbox_count']
        ],
        [
            'name' => 'profile-card',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/profile-card.blade.php',
            'pages_count' => count($componentUsage['profile-card'] ?? []),
            'pages' => $componentUsage['profile-card'] ?? [],
            'dependencies' => ['base8.css'],
            'dynamic_slots' => ['profile.id', 'profile.name', 'profile.age', 'profile.location', 'profile.avatar_url', 'profile.bio']
        ],
        [
            'name' => 'message-row-item',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/message-row.blade.php',
            'pages_count' => count($componentUsage['message-row-item'] ?? []),
            'pages' => $componentUsage['message-row-item'] ?? [],
            'dependencies' => ['base8.css'],
            'dynamic_slots' => ['message.sender', 'message.subject', 'message.created_at', 'message.is_read']
        ],
        [
            'name' => 'search-filter-box',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/search-filter.blade.php',
            'pages_count' => count($componentUsage['search-filter-box'] ?? []),
            'pages' => $componentUsage['search-filter-box'] ?? [],
            'dependencies' => ['drop_down.js', 'vietnam_provinces.json'],
            'dynamic_slots' => ['gender_options', 'age_min', 'age_max', 'province_options']
        ],
        [
            'name' => 'hero-carousel',
            'type' => 'theme-specific',
            'blade' => 'themes/ehenho/components/hero-carousel.blade.php',
            'pages_count' => count($componentUsage['hero-carousel'] ?? []),
            'pages' => $componentUsage['hero-carousel'] ?? [],
            'dependencies' => ['carousel.css', 'bootstrap.js'],
            'dynamic_slots' => ['featured_profiles', 'banner_images']
        ],
        [
            'name' => 'password-toggle-widget',
            'type' => 'reusable-ui',
            'blade' => 'themes/ehenho/components/password-toggle.blade.php',
            'pages_count' => count($componentUsage['password-toggle-widget'] ?? []),
            'pages' => $componentUsage['password-toggle-widget'] ?? [],
            'dependencies' => ['jquery.js', 'font-awesome'],
            'dynamic_slots' => ['input_name', 'input_id', 'label']
        ],
        [
            'name' => 'pagination-controls',
            'type' => 'reusable-ui',
            'blade' => 'themes/ehenho/components/pagination.blade.php',
            'pages_count' => count($componentUsage['pagination-controls'] ?? []),
            'pages' => $componentUsage['pagination-controls'] ?? [],
            'dependencies' => ['bootstrap.css'],
            'dynamic_slots' => ['paginator_instance']
        ],
        [
            'name' => 'modal-dialog',
            'type' => 'reusable-ui',
            'blade' => 'themes/ehenho/components/modal.blade.php',
            'pages_count' => count($componentUsage['modal-dialog'] ?? []),
            'pages' => $componentUsage['modal-dialog'] ?? [],
            'dependencies' => ['bootstrap.js'],
            'dynamic_slots' => ['modal_id', 'modal_title', 'slot']
        ]
    ]
];

file_put_contents($dataDir . '/component-matrix.json', json_encode($componentMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/component-matrix.json (" . count($componentMatrix['components']) . " components)\n";

// =========================================================================
// 4. ASSET SCAN & DEDUPLICATION
// =========================================================================
$imageDir = $htmlDir . DIRECTORY_SEPARATOR . 'images';
$cssDir = $htmlDir . DIRECTORY_SEPARATOR . 'css';
$jsDir = $htmlDir . DIRECTORY_SEPARATOR . 'js';
$iconDir = $htmlDir . DIRECTORY_SEPARATOR . 'icons';

$imageFiles = glob($imageDir . DIRECTORY_SEPARATOR . '*.*');
$cssFiles = glob($cssDir . DIRECTORY_SEPARATOR . '*.css');
$jsFiles = glob($jsDir . DIRECTORY_SEPARATOR . '*.*');
$iconFiles = glob($iconDir . DIRECTORY_SEPARATOR . '*.*');

$imageHashes = [];
$duplicateImages = [];
$totalImageBytes = 0;

foreach ($imageFiles as $img) {
    $imgName = basename($img);
    $bytes = filesize($img);
    $totalImageBytes += $bytes;
    $hash = md5_file($img);
    
    if (isset($imageHashes[$hash])) {
        $duplicateImages[] = [
            'original' => $imageHashes[$hash],
            'duplicate' => $imgName,
            'hash' => $hash,
            'size' => $bytes
        ];
    } else {
        $imageHashes[$hash] = $imgName;
    }
}

// Check which images are referenced in HTML
$referencedImagesList = array_keys($allReferencedImages);
$referencedBaseNames = array_map(fn($p) => basename($p), $referencedImagesList);
$unreferencedImages = [];

foreach ($imageFiles as $img) {
    $bn = basename($img);
    if (!in_array($bn, $referencedBaseNames)) {
        $unreferencedImages[] = $bn;
    }
}

$assetMatrix = [
    'summary' => [
        'total_images' => count($imageFiles),
        'total_images_size_bytes' => $totalImageBytes,
        'unique_image_hashes' => count($imageHashes),
        'duplicate_images_count' => count($duplicateImages),
        'referenced_images_in_html_count' => count($referencedBaseNames),
        'unreferenced_images_count' => count($unreferencedImages),
        'total_css_files' => count($cssFiles),
        'total_js_files' => count($jsFiles),
        'total_icon_files' => count($iconFiles)
    ],
    'css_assets' => array_map(fn($f) => [
        'file' => basename($f),
        'path' => 'public/e-henho/css/' . basename($f),
        'size_bytes' => filesize($f),
        'hash' => md5_file($f)
    ], $cssFiles),
    'js_assets' => array_map(fn($f) => [
        'file' => basename($f),
        'path' => 'public/e-henho/js/' . basename($f),
        'size_bytes' => filesize($f),
        'hash' => md5_file($f)
    ], $jsFiles),
    'icon_assets' => array_map(fn($f) => [
        'file' => basename($f),
        'path' => 'public/e-henho/icons/' . basename($f),
        'size_bytes' => filesize($f),
        'hash' => md5_file($f)
    ], $iconFiles),
    'duplicate_images' => $duplicateImages,
    'unreferenced_images_sample' => array_slice($unreferencedImages, 0, 50)
];

file_put_contents($dataDir . '/asset-matrix.json', json_encode($assetMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/asset-matrix.json (" . count($imageFiles) . " images, " . count($duplicateImages) . " duplicates, " . count($unreferencedImages) . " unreferenced)\n";

// =========================================================================
// 5. JAVASCRIPT MATRIX
// =========================================================================
$jsMatrix = [
    'scripts' => []
];

foreach ($jsFiles as $js) {
    $jsName = basename($js);
    $jsContent = file_get_contents($js);
    $pagesUsing = [];
    
    foreach ($pageInventory as $pi) {
        foreach ($pi['js_files'] as $jf) {
            if (basename($jf) === $jsName) {
                $pagesUsing[] = $pi['file'];
            }
        }
    }

    $jsMatrix['scripts'][] = [
        'script' => $jsName,
        'size_bytes' => filesize($js),
        'pages_count' => count($pagesUsing),
        'pages' => $pagesUsing,
        'has_ajax' => str_contains($jsContent, '$.ajax') || str_contains($jsContent, 'fetch(') || str_contains($jsContent, 'XMLHttpRequest'),
        'has_dom_ready' => str_contains($jsContent, '$(document).ready') || str_contains($jsContent, 'DOMContentLoaded'),
        'is_json_data' => str_ends_with($jsName, '.json'),
        'summary' => match($jsName) {
            'auth-session.js' => 'Client-side authentication session state tracker and UI sync',
            'drop_down.js' => 'Cascading dropdown selector for provinces and districts',
            'vietnam_provinces.json' => 'Administrative province and district dataset for location filters',
            'change_pw_validate.js' => 'Password reset and change confirmation validator',
            'django.csrf.js' => 'Legacy CSRF cookie extractor (to be replaced with Laravel @csrf / X-CSRF-TOKEN)',
            'email_check.js' => 'Email format check and typo suggestion helper',
            'fc_sc.js', 'fc_sc_pe.js' => 'Form control script for search and profile edit forms',
            '1st_f_fc.js', '1st_f_fc_pe.js', '1st_f_fc_upp.js' => 'First input auto-focus triggers',
            'lg_vld.js' => 'Login form validator',
            'mailcheck.js' => 'Third-party mailcheck library for email typo suggestions',
            default => 'Helper script'
        }
    ];
}

file_put_contents($dataDir . '/javascript-matrix.json', json_encode($jsMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/javascript-matrix.json (" . count($jsMatrix['scripts']) . " scripts)\n";

// =========================================================================
// 6. LARAVEL ENVIRONMENT SCAN
// =========================================================================
$composerLockFile = $rootDir . '/composer.lock';
$composerJsonFile = $rootDir . '/composer.json';
$packageJsonFile = $rootDir . '/package.json';

$composerLock = json_decode(file_get_contents($composerLockFile), true);
$composerJson = json_decode(file_get_contents($composerJsonFile), true);
$packageJson = json_decode(file_get_contents($packageJsonFile), true);

$packages = [];
if (isset($composerLock['packages'])) {
    foreach ($composerLock['packages'] as $pkg) {
        $packages[$pkg['name']] = $pkg['version'];
    }
}

$laravelEnv = [
    'framework' => [
        'name' => 'Laravel',
        'version' => $packages['laravel/framework'] ?? '12.0',
        'php_version' => PHP_VERSION,
        'php_version_constraint' => $composerJson['require']['php'] ?? '^8.2'
    ],
    'ecosystem_packages' => [
        'laravel/framework' => $packages['laravel/framework'] ?? '12.0',
        'laravel/fortify' => $packages['laravel/fortify'] ?? null,
        'livewire/livewire' => $packages['livewire/livewire'] ?? '4.x',
        'livewire/flux' => $packages['livewire/flux'] ?? null,
        'livewire/volt' => $packages['livewire/volt'] ?? null,
        'spatie/laravel-permission' => $packages['spatie/laravel-permission'] ?? null,
        'spatie/laravel-medialibrary' => $packages['spatie/laravel-medialibrary'] ?? null,
        'spatie/laravel-translatable' => $packages['spatie/laravel-translatable'] ?? null,
        'unisharp/laravel-filemanager' => $packages['unisharp/laravel-filemanager'] ?? null,
        'kalnoy/nestedset' => $packages['kalnoy/nestedset'] ?? null,
        'phpunit/phpunit' => $packages['phpunit/phpunit'] ?? '11.5.3'
    ],
    'frontend_stack' => [
        'npm_dependencies' => $packageJson['dependencies'] ?? [],
        'tailwind_version' => $packageJson['dependencies']['tailwindcss'] ?? '4.0.7',
        'vite_version' => $packageJson['dependencies']['vite'] ?? '7.0.4',
        'livewire' => true,
        'volt' => true,
        'fluxui_free' => true
    ],
    'server_environment' => [
        'os' => PHP_OS,
        'web_server' => 'MAMP Apache / PHP CLI',
        'database_default' => 'mysql',
        'session_driver' => 'database',
        'queue_driver' => 'database',
        'cache_driver' => 'database'
    ]
];

file_put_contents($dataDir . '/laravel-environment.json', json_encode($laravelEnv, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/laravel-environment.json\n";

// =========================================================================
// 7. LARAVEL ROUTES SCAN
// =========================================================================
$routeFiles = [
    'web.php' => $rootDir . '/routes/web.php',
    'project.php' => $rootDir . '/routes/project.php',
    'backend.php' => $rootDir . '/routes/backend.php',
    'wkcomputer.php' => $rootDir . '/routes/wkcomputer.php',
    'viettinmart.php' => $rootDir . '/routes/viettinmart.php',
    'api.php' => $rootDir . '/routes/api.php',
    'console.php' => $rootDir . '/routes/console.php'
];

$routesSummary = [];
foreach ($routeFiles as $rName => $rPath) {
    if (file_exists($rPath)) {
        $content = file_get_contents($rPath);
        preg_match_all('/Route::(get|post|put|patch|delete|any|match)\s*\(\s*[\'"]([^\'"]+)[\'"]/i', $content, $matches, PREG_SET_ORDER);
        $found = [];
        foreach ($matches as $m) {
            $found[] = [
                'method' => strtoupper($m[1]),
                'uri' => $m[2]
            ];
        }
        $routesSummary[$rName] = [
            'file' => $rName,
            'lines' => count(explode("\n", $content)),
            'route_declarations_count' => count($found),
            'routes' => $found
        ];
    }
}

file_put_contents($dataDir . '/laravel-routes.json', json_encode($routesSummary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/laravel-routes.json\n";

// =========================================================================
// 8. LARAVEL MODELS SCAN
// =========================================================================
$modelDir = $rootDir . '/app/Models';
$modelFiles = glob($modelDir . '/*.php');
$modelsSummary = [];

foreach ($modelFiles as $mf) {
    $mName = basename($mf, '.php');
    $content = file_get_contents($mf);

    // Extract table
    preg_match('/protected\s+\$table\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $tMatch);
    $table = $tMatch[1] ?? strtolower($mName) . 's';

    // Extract fillable
    preg_match('/protected\s+\$fillable\s*=\s*\[(.*?)\];/s', $content, $fMatch);
    $fillable = [];
    if (!empty($fMatch[1])) {
        preg_match_all('/[\'"]([^\'"]+)[\'"]/', $fMatch[1], $itemMatches);
        $fillable = $itemMatches[1];
    }

    // Extract relationships
    preg_match_all('/public\s+function\s+([a-zA-Z0-9_]+)\s*\(\)\s*(?::\s*([a-zA-Z0-9_]+))?\s*\{[^}]*return\s+\$this->(hasOne|hasMany|belongsTo|belongsToMany|morphTo|morphMany|morphToMany)\s*\(\s*([a-zA-Z0-9_:]+)/s', $content, $relMatches, PREG_SET_ORDER);
    $relationships = [];
    foreach ($relMatches as $rm) {
        $relationships[] = [
            'method' => $rm[1],
            'type' => $rm[3],
            'related' => str_replace('::class', '', $rm[4])
        ];
    }

    // Check tenant scoping traits
    $isProjectScoped = str_contains($content, 'BelongsToTenant') || str_contains($content, 'project_id');

    $modelsSummary[] = [
        'model' => $mName,
        'table' => $table,
        'is_project_scoped' => $isProjectScoped,
        'fillable_count' => count($fillable),
        'fillable' => $fillable,
        'relationships' => $relationships
    ];
}

file_put_contents($dataDir . '/laravel-models.json', json_encode($modelsSummary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/laravel-models.json (" . count($modelsSummary) . " models)\n";

// =========================================================================
// 9. DATABASE SCHEMA SCAN (Migrations based)
// =========================================================================
$migrationDir = $rootDir . '/database/migrations';
$migrationFiles = glob($migrationDir . '/*.php');
$migrationsSummary = [];
$tablesDetected = [];

foreach ($migrationFiles as $mig) {
    $content = file_get_contents($mig);
    preg_match_all('/Schema::create\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*function\s*\((?:Blueprint\s+)?\$([a-zA-Z0-9_]+)\)\s*\{(.*?)\}\s*\);/s', $content, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $tableName = $m[1];
        $body = $m[3];

        preg_match_all('/\$' . $m[2] . '->([a-zA-Z0-9_]+)\s*\(\s*[\'"]([^\'"]+)[\'"]/', $body, $colMatches, PREG_SET_ORDER);
        $columns = [];
        foreach ($colMatches as $cm) {
            $columns[] = [
                'type' => $cm[1],
                'name' => $cm[2]
            ];
        }

        $tablesDetected[$tableName] = [
            'migration' => basename($mig),
            'columns' => $columns,
            'has_project_id' => str_contains($body, "'project_id'"),
            'has_tenant_id' => str_contains($body, "'tenant_id'")
        ];
    }
}

file_put_contents($dataDir . '/database-schema.json', json_encode($tablesDetected, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/database-schema.json (" . count($tablesDetected) . " tables defined in migrations)\n";

// =========================================================================
// 10. HTML TO LARAVEL ROUTE MAP
// =========================================================================
$htmlRouteMap = [];
foreach ($pageInventory as $pi) {
    $htmlRouteMap[] = [
        'source_html' => $pi['file'],
        'page_type' => $pi['page_type'],
        'template' => $pi['template'],
        'laravel_uri' => $pi['url'],
        'http_method' => str_starts_with($pi['laravel_mapping']['route'], 'POST') ? 'POST' : 'GET',
        'controller_action' => $pi['laravel_mapping']['controller'],
        'target_blade' => 'themes.ehenho.pages.' . str_replace('.html', '', $pi['file']),
        'models' => $pi['laravel_mapping']['model']
    ];
}

file_put_contents($dataDir . '/html-to-laravel-route-map.json', json_encode($htmlRouteMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/html-to-laravel-route-map.json\n";

// =========================================================================
// 11. PAGE MATRIX (Comprehensive master matrix)
// =========================================================================
$pageMatrix = [
    'summary' => [
        'total_html_files' => count($htmlFiles),
        'unique_templates' => count($templateGroups),
        'unique_layouts' => 3, // frontend, auth, account
        'unique_components' => count($componentMatrix['components']),
        'total_images' => count($imageFiles)
    ],
    'pages' => $pageInventory
];

file_put_contents($dataDir . '/page-matrix.json', json_encode($pageMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/page-matrix.json\n";

// =========================================================================
// 12. PROJECT MATRIX
// =========================================================================
$projectMatrix = [
    'architecture' => 'Single Laravel Core with Multi-Project & Multi-Database dynamic routing',
    'projects' => [
        [
            'project_code' => 'viettinmart-eco',
            'name' => 'Viettinmart Grocery Ecommerce',
            'theme' => 'viettinmartdemo',
            'database_strategy' => 'central_shared_scoped',
            'database_connection' => 'mysql',
            'status' => 'active',
            'domain' => 'viettinmart.local'
        ],
        [
            'project_code' => 'wkcomputer',
            'name' => 'WKComputer Gaming & PC Builder',
            'theme' => 'wkcomputerdemo',
            'database_strategy' => 'central_shared_scoped',
            'database_connection' => 'mysql',
            'status' => 'active',
            'domain' => 'wkcomputer.local'
        ],
        [
            'project_code' => 'ehenho',
            'name' => 'eHenho Dating & Social Network',
            'theme' => 'ehenho',
            'database_strategy' => 'isolated_project_database',
            'database_connection' => 'project_ehenho',
            'database_name' => 'core_ehenho',
            'status' => 'candidate',
            'domain' => 'ehenho.local',
            'pages_count' => 22
        ]
    ]
];

file_put_contents($dataDir . '/project-matrix.json', json_encode($projectMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/project-matrix.json\n";

// =========================================================================
// 13. THEME MATRIX
// =========================================================================
$themeMatrix = [
    'themes' => [
        [
            'theme_id' => 'ehenho',
            'name' => 'eHenho Dating Theme',
            'source_path' => 'public/e-henho',
            'blade_views_path' => 'resources/views/themes/ehenho',
            'public_assets_path' => 'public/themes/ehenho',
            'framework' => 'Bootstrap 3.3.6 (isolated) + Custom Base8 CSS',
            'layouts' => [
                'layouts/app.blade.php',
                'layouts/auth.blade.php',
                'layouts/account.blade.php'
            ],
            'pages' => array_column($pageInventory, 'file'),
            'components' => array_column($componentMatrix['components'], 'name'),
            'assets' => [
                'css' => ['base8.css', 'carousel.css', 'normalize.css'],
                'js' => ['auth-session.js', 'drop_down.js', 'fc_sc.js', 'mailcheck.js', 'vietnam_provinces.json'],
                'images_count' => count($imageFiles)
            ]
        ],
        [
            'theme_id' => 'viettinmartdemo',
            'name' => 'Viettinmart Theme',
            'blade_views_path' => 'resources/views/frontend/themes/viettinmartdemo',
            'public_assets_path' => 'public/theme',
            'framework' => 'Tailwind / Custom'
        ],
        [
            'theme_id' => 'wkcomputerdemo',
            'name' => 'WKComputer Dark Theme',
            'blade_views_path' => 'resources/views/frontend/themes/wkcomputerdemo',
            'public_assets_path' => 'public/themes/wkcomputerdemo',
            'framework' => 'Custom Dark CSS / Vanilla JS'
        ]
    ]
];

file_put_contents($dataDir . '/theme-matrix.json', json_encode($themeMatrix, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/theme-matrix.json\n";

// =========================================================================
// 14. CONTENT MAP & DYNAMIC MAPPING
// =========================================================================
$contentMap = [
    'theme' => 'ehenho',
    'homepage' => [
        'hero' => [
            'headline' => 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách',
            'carousel_profiles' => 'Profile::where("is_featured", true)->take(8)->get()'
        ],
        'search_widget' => [
            'gender_options' => ['male' => 'Nam', 'female' => 'Nữ'],
            'age_range' => ['min' => 18, 'max' => 65],
            'provinces' => 'Province::all()'
        ],
        'new_members' => [
            'title' => 'Thành viên mới',
            'query' => 'Profile::latest()->take(12)->get()'
        ]
    ],
    'profile_detail' => [
        'avatar' => 'profile.avatar_url',
        'display_name' => 'profile.display_name',
        'age' => 'profile.age',
        'province' => 'profile.province.name',
        'marital_status' => 'profile.marital_status',
        'occupation' => 'profile.occupation',
        'bio' => 'profile.about_me',
        'interests' => 'profile.interests',
        'photos' => 'profile.media_gallery'
    ],
    'messages' => [
        'inbox' => 'Message::where("recipient_id", auth()->id())->latest()->paginate(20)',
        'sent' => 'Message::where("sender_id", auth()->id())->latest()->paginate(20)',
        'thread' => 'Message::where("conversation_id", $id)->orderBy("created_at", "asc")->get()'
    ]
];

file_put_contents($dataDir . '/content-map.json', json_encode($contentMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/content-map.json\n";

// =========================================================================
// 15. DEPRECATED CANDIDATES
// =========================================================================
$deprecatedCandidates = [
    'static_tracking_scripts' => [
        'google_tag_manager' => 'Removed from cloned HTML to prevent analytics pollution',
        'facebook_sdk' => 'Removed from cloned HTML to prevent external tracking',
        'github_buttons' => 'Removed from cloned HTML'
    ],
    'duplicate_static_assets' => [
        'duplicate_images_count' => count($duplicateImages),
        'unreferenced_images_count' => count($unreferencedImages)
    ],
    'legacy_django_csrf' => [
        'file' => 'public/e-henho/js/django.csrf.js',
        'reason' => 'Django-specific CSRF cookie reader; must be replaced with Laravel CSRF tokens in Blade forms.'
    ]
];

file_put_contents($dataDir . '/deprecated-candidates.json', json_encode($deprecatedCandidates, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "-> Generated data/deprecated-candidates.json\n";

echo "\n=== ALL 13 DATA FILES GENERATED SUCCESSFULLY IN data/ ===\n";
