<?php

namespace App\Providers;

use App\Services\DynamicWidgetRenderer;
use App\Services\ProjectPasswordService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Helpers\SuperAdminLogHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ProjectPasswordService::class);
        $this->app->singleton(DynamicWidgetRenderer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! app()->runningInConsole()) {
            header('X-Powered-By: VGTCRM');
        }

        // Configure Livewire to use project.web middleware
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle)
                ->middleware('project.web');
        });

        // Register Blade directives for widgets
        Blade::directive('widgetArea', function ($expression) {
            return "<?php echo app(\App\Services\DynamicWidgetRenderer::class)->renderArea($expression); ?>";
        });

        Blade::directive('widget', function ($expression) {
            return "<?php echo app(\App\Services\DynamicWidgetRenderer::class)->renderById($expression); ?>";
        });

        // Log logins
        Event::listen(function (Login $event) {
            $user = $event->user;
            $ip = request()->ip();
            $userAgent = request()->userAgent();
            SuperAdminLogHelper::logActivity('User Logged In', [
                'user_id' => $user->id ?? null,
                'email' => $user->email ?? null,
                'ip_address' => $ip,
                'user_agent' => $userAgent
            ]);
        });

        // Log logouts
        Event::listen(function (Logout $event) {
            $user = $event->user;
            $ip = request()->ip();
            SuperAdminLogHelper::logActivity('User Logged Out', [
                'user_id' => $user->id ?? null,
                'email' => $user->email ?? null,
                'ip_address' => $ip
            ]);
        });
    }
}
