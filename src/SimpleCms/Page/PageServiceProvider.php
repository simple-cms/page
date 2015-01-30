<?php namespace SimpleCms\Page;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider {

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    // Register our package views
    $this->loadViewsFrom(__DIR__.'/../../views', 'page');

    // Register our package translation files
    $this->loadTranslationsFrom(__DIR__.'/../../lang', 'page');

    // Register the files our package should publish
    $this->publishes([
      // Publish our views
      __DIR__.'/../../views' => base_path('resources/views/vendor/page'),
      // Publish our config
      __DIR__.'/../../config/page.php' => config_path('page.php'),
    ]);

    require __DIR__.'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('SimpleCms\Page\RepositoryInterface', function($app)
    {
      return new EloquentRepository(new Page);
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}
