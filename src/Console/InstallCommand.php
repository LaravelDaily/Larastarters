<?php

namespace LaravelDaily\Larastarters\Console;

use RuntimeException;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larastarters:install
                            {--composer=global : Absolute path to the Composer binary which should be used to install packages}
                            {--php_version=php : Php version command, like `sail` or `./vendor/bin/sail` or `docker-compose up...`}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install one of the Larastarters Themes';

    /**
     * The artisan command to run. Default is php.
     *
     * @var string
     */
    protected string $php_version;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->php_version = $this->option('php_version');
        
        $kit = $this->components->choice(
            'Which Laravel starter kit you want to use?',
            ['Laravel Breeze (Tailwind)', 'Laravel Breeze & Inertia (Tailwind)', 'Laravel UI (Bootstrap)'],
            0
        );

        if ($kit === "Laravel Breeze (Tailwind)") {
            $theme = $this->components->choice(
                'Which design theme you want to use?',
                ['windmill', 'notusjs', 'tailwindcomponents'],
                0
            );

            // Install breeze
            $this->requireComposerPackages('laravel/breeze:^1.4');
            shell_exec("{$this->php_version} artisan breeze:install blade");

            copy(__DIR__ . '/../../resources/stubs/routes.php', base_path('routes/web.php'));

            copy(__DIR__ . '/../../resources/stubs/controllers/UserController.php', app_path('Http/Controllers/UserController.php'));

            (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/requests', app_path('Http/Requests/'));

            if ($theme === 'windmill') {
                return $this->replaceWindmill();
            }

            if ($theme === 'notusjs') {
                return $this->replaceWithNotusjs();
            }

            if ($theme === 'tailwindcomponents') {
                return $this->replaceWithTailwindComponents();
            }
        }

        if ($kit === "Laravel Breeze & Inertia (Tailwind)") {
            $theme = $this->components->choice(
                'Which design theme you want to use?',
                ['windmill', 'notusjs', 'tailwindcomponents'],
                0
            );

            // Install breeze
            $this->requireComposerPackages('laravel/breeze:^1.4');
            shell_exec("{$this->php_version} artisan breeze:install vue");

            copy(__DIR__ . '/../../resources/stubs/breeze/inertia/routes.php', base_path('routes/web.php'));

            copy(__DIR__ . '/../../resources/stubs/breeze/inertia/controllers/UserController.php', app_path('Http/Controllers/UserController.php'));

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/Middleware', app_path('Http/Middleware/'));

            (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/requests', app_path('Http/Requests/'));

            if ($theme === 'windmill') {
                return $this->replaceWithInertiaWindmill();
            }

            if ($theme === 'notusjs') {
                return $this->replaceWithInertiaNotusjs();
            }

            if ($theme === 'tailwindcomponents') {
                return $this->replaceWithInertiaTailwindComponents();
            }
        }

        if ($kit === "Laravel UI (Bootstrap)") {
            $theme = $this->components->choice(
                'Which design theme you want to use?',
                ['adminlte', 'coreui', 'plainadmin', 'volt', 'sb-admin-2', 'tabler'],
                0
            );

            $this->requireComposerPackages('laravel/ui 4.2.2');
            shell_exec("{$this->php_version} artisan ui bootstrap --auth");

            file_put_contents(
                base_path('routes/web.php'),
                file_get_contents(__DIR__ . '/../../resources/stubs/routes.stub'),
                FILE_APPEND
            );

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/controllers', app_path('Http/Controllers/'));

            (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/requests', app_path('Http/Requests/'));

            copy(__DIR__ . '/../../resources/stubs/ui/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));
            copy(__DIR__ . '/../../resources/stubs/ui/vite.config.js', base_path('vite.config.js'));

            if ($theme === 'adminlte') {
                return $this->replaceWithAdminLTETheme();
            }

            if ($theme === 'coreui') {
                return $this->replaceWithCoreUITheme();
            }

            if ($theme === 'plainadmin') {
                return $this->replaceWithPlainAdminTheme();
            }

            if ($theme === 'volt') {
                return $this->replaceWithVolt();
            }

            if ($theme === 'sb-admin-2') {
                return $this->replaceWithSBAdmin2();
            }
        }
    }

    protected function replaceWindmill()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                'color' => '^4.0.1'
            ] + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->ensureDirectoryExists(public_path('js'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/windmill/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/windmill/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/windmill/views/components', resource_path('views/components'));

        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/views/about.blade.php', resource_path('views/about.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/views/profile/edit.blade.php', resource_path('views/profile/edit.blade.php'));

        // Assets
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/js/init-alpine.js', public_path('js/init-alpine.js'));

        // Images
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/windmill/images', public_path('images'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/views/users/index.blade.php', resource_path('views/users/index.blade.php'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/vendor/pagination'));
        copy(__DIR__ . '/../../resources/stubs/breeze/windmill/views/pagination/tailwind.blade.php', resource_path('views/vendor/pagination/tailwind.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithNotusjs()
    {
        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));
        (new Filesystem)->ensureDirectoryExists(public_path('images'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/components', resource_path('views/components'));

        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/about.blade.php', resource_path('views/about.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/profile/edit.blade.php', resource_path('views/profile/edit.blade.php'));

        // Assets
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/tailwind.config.js', base_path('tailwind.config.js'));

        // Images
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/notusjs/images', public_path('images'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithTailwindComponents()
    {
        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/components', resource_path('views/components'));

        (new Filesystem)->delete(resource_path('views/components/responsive-nav-link.blade.php'));

        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/about.blade.php', resource_path('views/about.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/profile/edit.blade.php', resource_path('views/profile/edit.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithAdminLTETheme()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    'jquery'=> '^3.3.1',
                    'resolve-url-loader' => '^4.0.0',
                    'bootstrap' => '~4.6.1',
                    'popper.js' => '^1.14.3',
                ] + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/layouts', resource_path('views/layouts'));

        // Assets
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->ensureDirectoryExists(public_path('css'));
        (new Filesystem)->ensureDirectoryExists(public_path('js'));
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->ensureDirectoryExists(public_path('webfonts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/css', public_path('css'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/js', public_path('js'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/images', public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/webfonts', public_path('webfonts'));

        copy(__DIR__ . '/../../resources/stubs/ui/adminlte/views/home.blade.php', resource_path('views/home.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/adminlte/views/about.blade.php', resource_path('views/about.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/adminlte/js/bootstrap.js', resource_path('js/bootstrap.js'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/adminlte/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithCoreUITheme()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                '@coreui/coreui' => '^4.0.2',
                'resolve-url-loader' => '^4.0.0',
                'bootstrap' => '~5.1.3',
            ] + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/views/layouts', resource_path('views/layouts'));

        // Assets
        (new Filesystem)->ensureDirectoryExists(public_path('icons'));
        (new Filesystem)->ensureDirectoryExists(public_path('js'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/icons', public_path('icons'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/sass', resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/coreui/js', public_path('js'));

        copy(__DIR__ . '/../../resources/stubs/ui/coreui/views/home.blade.php', resource_path('views/home.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/coreui/views/about.blade.php', resource_path('views/about.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/coreui/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithPlainAdminTheme()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                'bootstrap' => '~5.1.3',
                '@popperjs/core' => '^2.10.2',
                'resolve-url-loader' => '^4.0.0',
            ] + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/layouts', resource_path('views/layouts'));

        // Assets
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->ensureDirectoryExists(public_path('js'));
        (new Filesystem)->ensureDirectoryExists(public_path('css'));
        (new Filesystem)->ensureDirectoryExists(public_path('fonts'));
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->ensureDirectoryExists(public_path('images/auth'));
        (new Filesystem)->ensureDirectoryExists(public_path('images/logo'));

        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/alerts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/buttons'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/cards'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/forms'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/header'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/icons'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/notification'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/tables'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/typography'));

        copy(__DIR__ . '/../../resources/stubs/ui/plainadmin/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/../../resources/stubs/ui/plainadmin/js/main.js', public_path('js/main.js'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/fonts', public_path('fonts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/css', public_path('css'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/images/auth', public_path('images/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/images/logo', public_path('images/logo'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass', resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/alerts', resource_path('sass/alerts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/auth', resource_path('sass/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/buttons', resource_path('sass/buttons'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/cards', resource_path('sass/cards'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/forms', resource_path('sass/forms'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/header', resource_path('sass/header'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/icons', resource_path('sass/icons'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/notification', resource_path('sass/notification'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/tables', resource_path('sass/tables'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/plainadmin/sass/typography', resource_path('sass/typography'));

        copy(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/home.blade.php', resource_path('views/home.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/about.blade.php', resource_path('views/about.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/plainadmin/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithVolt()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            $dependencies = [
                "@fortawesome/fontawesome-free" => "^5.15.4",
                "@popperjs/core" => "^2.10.2",
                "bootstrap" => "~5.1.3",
                "cross-env" => "^7.0.3",
                "node-sass" => "^6.0.0",
                "onscreen" => "1.3.4",
                "resolve-url-loader" => "4.0.0",
                "simplebar" => "^5.3.6",
                "smooth-scroll" => "^16.1.3",
                "sass" => "^1.38.0",
            ];
            return $dependencies + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/layouts', resource_path('views/layouts'));

        // Assets
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->ensureDirectoryExists(public_path('images/brand'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/custom'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/volt'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/volt/components'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/volt/forms'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/volt/layout'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass/volt/mixins'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/images', public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/images/brand', public_path('images/brand'));

        copy(__DIR__ . '/../../resources/stubs/ui/voltbs5/js/app.js', resource_path('js/app.js'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass', resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/custom', resource_path('sass/custom'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/volt', resource_path('sass/volt'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/volt/components', resource_path('sass/volt/components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/volt/forms', resource_path('sass/volt/forms'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/volt/layout', resource_path('sass/volt/layout'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/voltbs5/sass/volt/mixins', resource_path('sass/volt/mixins'));

        copy(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/home.blade.php', resource_path('views/home.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/about.blade.php', resource_path('views/about.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/voltbs5/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

	protected function replaceWithSBAdmin2()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                "bootstrap" => "^4.6.2",
                "popper.js" => "^1.14.3",
                "jquery" => "^3.3.1",
            ] + $packages;
        });

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/layouts', resource_path('views/layouts'));

        // Assets
        (new Filesystem)->ensureDirectoryExists(public_path('css'));
        (new Filesystem)->ensureDirectoryExists(public_path('js'));
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->ensureDirectoryExists(public_path('webfonts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/css', public_path('css'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/js', public_path('js'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/images', public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/webfonts', public_path('webfonts'));

        copy(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/home.blade.php', resource_path('views/home.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/about.blade.php', resource_path('views/about.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/sb-admin-2/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithInertiaWindmill()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Users'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Pages', resource_path('js/Pages'));

        // Images
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/images', public_path('images'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithInertiaNotusjs()
    {
        // Js
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Users'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/js/Pages', resource_path('js/Pages'));

        // Assets
        copy(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/tailwind.config.js', base_path('tailwind.config.js'));

        // Views
        copy(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/views/app.blade.php', resource_path('views/app.blade.php'));

        // Images
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/notusjs/images', public_path('images'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithInertiaTailwindComponents()
    {
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Pages', resource_path('js/Pages'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    /**
     * Installs the given Composer Packages into the application.
     * Taken from https://github.com/laravel/breeze/blob/1.x/src/Console/InstallCommand.php
     *
     * @param mixed $packages
     * @return void
     */
    protected function requireComposerPackages($packages)
    {
        $composer = $this->option('composer');

        if ($composer !== 'global') {
            $command = ['php', $composer, 'require'];
        }

        $command = array_merge(
            $command ?? ['composer', 'require'],
            is_array($packages) ? $packages : func_get_args()
        );

        (new Process($command, base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }

    /**
     * Update the "package.json" file.
     * Taken from https://github.com/laravel/breeze/blob/1.x/src/Console/InstallCommand.php
     *
     * @param callable $callback
     * @param bool $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * Run the given commands.
     * Taken from https://github.com/laravel/breeze/blob/1.x/src/Console/InstallCommand.php
     *
     * @param  array  $commands
     * @return void
     */
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    '.$line);
        });
    }
}
