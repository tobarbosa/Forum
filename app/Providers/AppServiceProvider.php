<?php

namespace App\Providers;

use App\View\Compilers\DockerSafeBladeCompiler;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Workaround: Docker Desktop on Windows mounts the project via
        // virtiofs/9P with `dirsync`, which rejects `utimensat()` with an
        // arbitrary timestamp. The default Blade compiler's cache-hit path
        // calls `touch($compiledPath, $lastModified + 1)`, which throws
        // "Utime failed: Operation not permitted" inside the container.
        //
        // Replace the Blade compiler binding with a subclass that skips
        // the touch. Content-based hashing in the compiler already makes
        // the touch a pure optimization.
        $this->app->singleton(BladeCompiler::class, function ($app) {
            return new DockerSafeBladeCompiler(
                $app['files'],
                $app['config']['view.compiled']
            );
        });
    }
}
