<?php

namespace LaravelDaily\Larastarters\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class GenerateServiceClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service : Name of service} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service class';

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
     * Check if service already exists.
     *
     * @param  string $serviceName
     * @return void
     */
    protected function isServiceExists(string $serviceName)
    {
        $path = app_path('Services') . $serviceName . '.php';
        return file_exists($path);
    }

    /**
     * Prepare target directory where service is generated.
     *
     * @param  string  $serviceName
     * @return string  $path
     */
    protected function prepareGeneratedPath(string $serviceName)
    {
        $directory = app_path('Services');
        if (! file_exists($directory)) {
            shell_exec('mkdir ' . $serviceBasePath);
        }

        // Check if service has extended directory
        $explode = explode('/', $serviceName);
        $realServiceName = $explode[count($explode) - 1];
        $extendedPath = null;
        if (count($explode) > 1) { // Has extended directory path
            unset($explode[count($explode) - 1]);
            $extendedPath = implode('/', $explode);
            $directory = $directory . '/' . $extendedPath;

            if (! file_exists($directory)) shell_exec('mkdir ' . $directory);
        }

        return [
            'name' => $realServiceName,
            'path' => $directory . '/' . $realServiceName . '.php',
            'extended_path' => '\\' . $extendedPath,
        ];
    }

    /**
     * Process inserted data and replace to available template.
     *
     * @param  string  $serviceName
     * @return string  $template
     */
    public function prepareTemplate(string $serviceName, $extendedPath = null, $addedModel = null)
    {
        $templatePath = (__DIR__ . '/../../resources/stubs/Service.stub');
        $template = file_get_contents($templatePath);

        if ($addedModel) $addedModel = "\nuse App\\Models\\" . $addedModel . ";\n";

        return str_replace(
            ['{{serviceName}}', '{{extendedPath}}', '{{addedModel}}'], 
            [$serviceName, $extendedPath, $addedModel], 
            $template
        );
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $serviceName = $this->argument('service');
        $addedModel = $this->option('model');

        if ($this->isServiceExists($serviceName)) {
            return $this->error('Service already exists!');
        }

        $directory = $this->prepareGeneratedPath($serviceName);
        $name = $directory['name'];
        $path = $directory['path'];
        $extendedPath = $directory['extended_path'];

        $content = $this->prepareTemplate($name, $extendedPath, $addedModel);
        
        if (! file_put_contents($path, $content)) {
            return $this->error('Failed to create service class file to folder.');
        }

        return $this->info('Service has been created successfully!');
    }
}
