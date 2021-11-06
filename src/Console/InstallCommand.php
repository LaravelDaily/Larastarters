<?php

namespace LaravelDaily\Larastarters\Console;

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
                            {--composer=global : Absolute path to the Composer binary which should be used to install packages}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install one of the Larastarters Themes';

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
        $kit = $this->choice(
            'Which Laravel starter kit you want to use?',
            ['Laravel Breeze (Tailwind)', 'Laravel Breeze (InertiaJS & Vuetify)', 'Laravel UI (Bootstrap)'],
            0
        );

        if ($kit === "Laravel Breeze (Tailwind)") {
            $theme = $this->choice(
                'Which design theme you want to use?',
                ['windmill', 'notusjs', 'tailwindcomponents'],
                0
            );

            // Install breeze
            $this->requireComposerPackages('laravel/breeze:^1.4');
            shell_exec('php artisan breeze:install');

            file_put_contents(
                base_path('routes/web.php'),
                file_get_contents(__DIR__ . '/../../resources/stubs/routes.stub'),
                FILE_APPEND
            );

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/controllers', app_path('Http/Controllers/'));

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

        if ($kit === "Laravel Breeze (InertiaJS & Vuetify)") {
            $this->requireComposerPackages('laravel/breeze:^1.4');
            shell_exec('php artisan breeze:install vue');
            
            // NPM Packages...
            $this->updateNodePackages(function ($packages) {
                return [
                    '@inertiajs/inertia' => '^0.10.1',
                    '@inertiajs/inertia-vue' => '^0.7.2',
                    '@vue/eslint-config-standard' => '^6.0.0',
                    "eslint" => "^7.21.0",
                    "eslint-plugin-import" => "^2.22.1",
                    "eslint-plugin-node" => "^11.1.0",
                    "eslint-plugin-promise" => "^4.3.1",
                    "eslint-plugin-vue" => "^7.6.0",
                    "eslint-webpack-plugin" => "^2.5.2",
                    "sass"=> '^1.32.8',
                    'sass-loader'=> '^11.0.1',
                    'vue' => '^2.6.10',
                    'vue-i18n' => '^8.23.0',
                    'vue-template-compiler' => '^2.6.12',
                    'vuetify' => '^2.4.5',
                    'vuetify-loader' => '^1.7.2',
                    'vuex' => '^3.6.2',
                ] + $packages;
            });

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/vuetify/resources', resource_path('/'));
            copy(__DIR__ . '/../../resources/stubs/breeze/vuetify/middleware/HandleInertiaRequests.php', base_path('app/Http/Middleware/HandleInertiaRequests.php'));
            copy(__DIR__ . '/../../resources/stubs/breeze/vuetify/webpack.config.js', base_path('/webpack.config.js'));
            copy(__DIR__ . '/../../resources/stubs/breeze/vuetify/webpack.mix.js', base_path('/webpack.mix.js'));
        }

        if ($kit === "Laravel UI (Bootstrap)") {
            $theme = $this->choice(
                'Which design theme you want to use?',
                ['adminlte', 'coreui', 'plainadmin'],
                0
            );

            $this->requireComposerPackages('laravel/ui:^3.3');
            shell_exec('php artisan ui bootstrap --auth');

            file_put_contents(
                base_path('routes/web.php'),
                file_get_contents(__DIR__ . '/../../resources/stubs/routes.stub'),
                FILE_APPEND
            );

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/controllers', app_path('Http/Controllers/'));

            copy(__DIR__ . '/../../resources/stubs/ui/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));

            if ($theme === 'adminlte') {
                return $this->replaceWithAdminLTETheme();
            }

            if ($theme === 'coreui') {
                return $this->replaceWithCoreUITheme();
            }

            if ($theme === 'plainadmin') {
                return $this->replaceWithPlainAdminTheme();
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

        $this->info('Breeze scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
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

        // Assets
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/tailwind.config.js', base_path('tailwind.config.js'));

        // Images
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/notusjs/images', public_path('images'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/breeze/notusjs/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->info('Breeze scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
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

        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/about.blade.php', resource_path('views/about.blade.php'));

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/breeze/tailwindcomponents/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->info('Breeze scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    protected function replaceWithAdminLTETheme()
    {
        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth/passwords'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/auth/passwords', resource_path('views/auth/passwords'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/ui/adminlte/views/layouts', resource_path('views/layouts'));

        // Assets
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

        // Demo table
        (new Filesystem)->ensureDirectoryExists(resource_path('views/users'));
        copy(__DIR__ . '/../../resources/stubs/ui/adminlte/views/users/index.blade.php', resource_path('views/users/index.blade.php'));

        $this->info('Laravel UI scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    protected function replaceWithCoreUITheme()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                '@coreui/coreui' => '^4.0.2',
                'resolve-url-loader' => '^4.0.0',
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

        $this->info('Laravel UI scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    protected function replaceWithPlainAdminTheme()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                'bootstrap' => '^5.1.3',
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

        $this->info('Laravel UI scaffolding replaced successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
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
}
