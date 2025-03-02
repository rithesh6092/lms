<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(180)->by($request->user()?->id ?: $request->ip());
        });

        $this->configureRoutes();
    }

    /**
     * Configure the routes for the application.
     */
    protected function configureRoutes(): void
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes('api');
    }

    /**
     * Map the web routes for the application.
     */
    protected function mapWebRoutes(string $middleware = 'web'): void
    {
        Route::middleware($middleware)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Map the API routes for the application.
     *
     * @param  string|null  $middleware
     */
    protected function mapApiRoutes(string $middleware, ?string $prefix = null): void
    {
        Route::middleware($middleware)
            ->prefix("api/v1/{$prefix}")
            ->group(base_path('routes/api.php'));
    }
}
