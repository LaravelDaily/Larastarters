<?php

namespace LaravelDaily\Larastarters\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallUiThemes
{
    protected function replaceWithAdminLTETheme(): void
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

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithCoreUITheme(): void
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

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithPlainAdminTheme(): void
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

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }

    protected function replaceWithVolt(): void
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            $dependencies = [
                "@fortawesome/fontawesome-free" => "^5.15.4",
                "@popperjs/core" => "^2.10.2",
                "bootstrap" => "~5.1.3",
                "cross-env" => "^7.0.3",
                "onscreen" => "1.3.4",
                "resolve-url-loader" => "4.0.0",
                "simplebar" => "^5.3.6",
                "smooth-scroll" => "^16.1.3",
                "sass" => "^1.72.0",
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

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Laravel UI scaffolding replaced successfully.');
    }
}
