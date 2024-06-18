<?php
namespace Lexontech\Root;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Router;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Lexontech\Root\app\Http\Middleware\AdminMiddleware;
use Lexontech\Root\app\Http\Middleware\HavingTypeMiddleware;
use Lexontech\Root\app\Models\Setting;
use Lexontech\Root\database\seeders\AuthenticationSystem\AttributeSeeder;
use Lexontech\Root\app\Infrastructures\Date;
use Lexontech\Root\app\Infrastructures\Message;
use Lexontech\Root\app\Infrastructures\Transfer;
use Illuminate\Foundation\AliasLoader;
use Lexontech\Root\app\Models\RootSidebar;
use Lexontech\Root\database\seeders\Root\SettingSeeder;
use Lexontech\Root\database\seeders\Root\SidebarSeeder;

class RootServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {


        require_once __DIR__.'/app/Infrastructures/helper.php';

        Schema::defaultStringLength(191);

        // Get the AliasLoader instance
        $loader = AliasLoader::getInstance();

        // Add your aliases
        $loader->alias('ReturnMessage', \Lexontech\Root\app\Facades\Root\Message::class);
        $loader->alias('TransferFacade', \Lexontech\Root\app\Facades\Root\Transfer::class);
        $loader->alias('DateJalali', \Lexontech\Root\app\Facades\Root\Date::class);
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        //where like
        Builder::macro('whereLike',function (string $attribute,string $searchTerm){
            $searchTerm = trim($searchTerm);
            return $this->Where($attribute, 'Like', "%{$searchTerm}%");
        });

        //migrations
        $this->publishesMigrations([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ],'rootMigration');

         $this->publishes([
            __DIR__.'/public' => public_path('/'),
        ], 'rootPublic');

        //views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'RootView');
        $this->publishes([
            __DIR__.'/resources/views/errors' => resource_path('views/errors'),
        ]);

        //rotes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        App::alias(Message::class, 'ReturnMessage');
        App::alias(Transfer::class, 'TransferFacade');
        App::alias(Date::class, 'DateJalali');

        //seeder
        $seed_list[] = SidebarSeeder::class;
        $seed_list[] = SettingSeeder::class;
        $seed_list[] = AttributeSeeder::class;
        $this->loadSeeders($seed_list);

        $router->middlewareGroup('admin', [AdminMiddleware::class]);

        $router->middlewareGroup('havingType', [HavingTypeMiddleware::class]);

        view()->composer('*', function ()  {
            $settings               = Setting::all();
            $settings               = \setting($settings);
            $menus             = RootSidebar::GettingSidebarsWithChildren();
            view()->share("settings", $settings);
            view()->share("menus", $menus);
        });
    }

    protected function loadSeeders($seed_list)
    {
        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ((array) $seed_list as $path) {
                $seeder->call($seed_list);
                // here goes the code that will print out in console that the migration was succesful
            }
        });
    }
}
