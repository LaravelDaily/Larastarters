<?php

namespace LaravelDaily\Larastarters\Console;

use RuntimeException;
use Illuminate\Console\Command;
use function Laravel\Prompts\select;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use InstallBreezeThemes, InstallBreezeInertiaThemes, InstallUiThemes;

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

        $kit = select(
            label: 'Which Laravel starter kit you want to use?',
            options: ['Laravel Breeze (Tailwind)', 'Laravel Breeze & Inertia (Tailwind)', 'Laravel UI (Bootstrap)'],
            default: 'Laravel Breeze (Tailwind)',
        );

        if ($kit === "Laravel Breeze (Tailwind)") {
            $theme = select(
                label: 'Which design theme you want to use?',
                options: ['windmill', 'notusjs', 'tailwindcomponents'],
                default: 'windmill',
            );

            // Install breeze
            $this->requireComposerPackages('laravel/breeze:^2.0');
            $this->runCommands(["{$this->php_version} artisan breeze:install blade"]);

            copy(__DIR__ . '/../../resources/stubs/routes.php', base_path('routes/web.php'));

            copy(__DIR__ . '/../../resources/stubs/controllers/UserController.php', app_path('Http/Controllers/UserController.php'));

            (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/requests', app_path('Http/Requests/'));

            if ($theme === 'windmill') {
                $this->replaceWindmill();
            }

            if ($theme === 'notusjs') {
                $this->replaceWithNotusjs();
            }

            if ($theme === 'tailwindcomponents') {
                $this->replaceWithTailwindComponents();
            }
        }

        if ($kit === "Laravel Breeze & Inertia (Tailwind)") {
            $theme = select(
                label: 'Which design theme you want to use?',
                options: ['windmill', 'notusjs', 'tailwindcomponents'],
                default: 'windmill',
            );

            // Install breeze
            $this->requireComposerPackages('laravel/breeze:^2.0');
            $this->runCommands(["{$this->php_version} artisan breeze:install vue"]);

            copy(__DIR__ . '/../../resources/stubs/breeze/inertia/routes.php', base_path('routes/web.php'));

            copy(__DIR__ . '/../../resources/stubs/breeze/inertia/controllers/UserController.php', app_path('Http/Controllers/UserController.php'));

            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/breeze/inertia/Middleware', app_path('Http/Middleware/'));

            (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
            (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/requests', app_path('Http/Requests/'));

            if ($theme === 'windmill') {
                $this->replaceWithInertiaWindmill();
            }

            if ($theme === 'notusjs') {
                $this->replaceWithInertiaNotusjs();
            }

            if ($theme === 'tailwindcomponents') {
                $this->replaceWithInertiaTailwindComponents();
            }
        }

        if ($kit === "Laravel UI (Bootstrap)") {
            $theme = select(
                label: 'Which design theme you want to use?',
                options: ['adminlte', 'coreui', 'plainadmin', 'volt'],
                default: 'adminlte',
            );

            $this->requireComposerPackages('laravel/ui ^4.5');
            $this->runCommands(["{$this->php_version} artisan ui:auth --force"]);

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
                $this->replaceWithAdminLTETheme();
            }

            if ($theme === 'coreui') {
                $this->replaceWithCoreUITheme();
            }

            if ($theme === 'plainadmin') {
                $this->replaceWithPlainAdminTheme();
            }

            if ($theme === 'volt') {
                $this->replaceWithVolt();
            }
        }
    }

    /**
     * Installs the given Composer Packages into the application.
     * Taken from https://github.com/laravel/breeze/blob/1.x/src/Console/InstallCommand.php
     *
     * @param mixed $packages
     * @return void
     */
    protected function requireComposerPackages($packages): void
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
    protected static function updateNodePackages(callable $callback, bool $dev = true): void
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
    protected function runCommands($commands): void
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
