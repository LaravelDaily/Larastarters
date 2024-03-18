<?php

namespace LaravelDaily\Larastarters\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallBreezeInertiaThemes
{
    protected function replaceWithInertiaWindmill(): void
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Users'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/js/Pages', resource_path('js/Pages'));

        // Images
        (new Filesystem)->ensureDirectoryExists(public_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/windmill/images', public_path('images'));

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithInertiaNotusjs(): void
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

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Breeze scaffolding replaced successfully.');
    }

    protected function replaceWithInertiaTailwindComponents(): void
    {
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/tailwindcomponents/js/Pages', resource_path('js/Pages'));

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Breeze scaffolding replaced successfully.');
    }
}