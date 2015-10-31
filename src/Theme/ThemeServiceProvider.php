<?php
namespace Karlomikus\Theme;

use Illuminate\Support\ServiceProvider;
use Karlomikus\Theme\Commands\ThemeListCommand;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        require __DIR__.'/helpers.php';

        $this->publishes([
            __DIR__ . '/config/theme.php' => config_path('theme.php'),
        ]);

        $this->app->bind('theme', function ($app) {
            return new Theme($app);
        });

        $this->commands(ThemeListCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theme'];
    }
}
