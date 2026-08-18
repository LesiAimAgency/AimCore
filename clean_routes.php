<?php

$deletedControllers = [
    'Admin\AttributeController',
    'Admin\BranchController',
    'Admin\BrandController',
    'Admin\CategoryController',
    'Admin\ContactController',
    'Admin\FaqController',
    'Admin\FeedbackController',
    'Admin\FontController',
    'Admin\MenuController',
    'Admin\OrderController',
    'Admin\ProductController',
    'Admin\SubscriberController',
    'Admin\WebsiteConfigController',
    'Admin\WidgetController',
    'Admin\WidgetDebugController',
    'Admin\WidgetTemplateController',
    'Frontend\CartController',
    'Frontend\ProductController',
    'SuperAdmin\ContractController',
    'SuperAdmin\EmployeeController',
    'SuperAdmin\PositionController',
    'SuperAdmin\TaskController',
    'SuperAdmin\TicketController',
    // also their class basenames just in case they are imported
    'AttributeController',
    'BranchController',
    'BrandController',
    'CategoryController',
    'ContactController',
    'FaqController',
    'FeedbackController',
    'FontController',
    'MenuController',
    'OrderController',
    'ProductController',
    'SubscriberController',
    'WebsiteConfigController',
    'WidgetController',
    'WidgetDebugController',
    'WidgetTemplateController',
    'CartController',
    'ContractController',
    'EmployeeController',
    'PositionController',
    'TaskController',
    'TicketController',
];

$files = glob(__DIR__.'/routes/*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    $lines = explode("\n", $content);
    $newLines = [];
    $changed = false;

    foreach ($lines as $line) {
        $shouldComment = false;
        foreach ($deletedControllers as $ctrl) {
            // Regex to match the controller usage precisely (e.g. `WidgetController::class` or `\Admin\WidgetController`)
            if (preg_match('/'.preg_quote($ctrl, '/').'\b/', $line)) {
                // If it's not already commented
                if (strpos(trim($line), '//') !== 0) {
                    $shouldComment = true;
                    break;
                }
            }
        }

        if ($shouldComment) {
            $newLines[] = '// [CLEANED] '.$line;
            $changed = true;
        } else {
            $newLines[] = $line;
        }
    }

    if ($changed) {
        file_put_contents($file, implode("\n", $newLines));
        echo "Cleaned $file\n";
    }
}
