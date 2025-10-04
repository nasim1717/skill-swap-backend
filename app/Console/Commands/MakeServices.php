<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServices extends Command
{
    protected $signature   = 'make:service {name : The name of the service (e.g., User/User)}';
    protected $description = 'Create a new Service class with proper namespace and suffix';

    public function handle(): void
    {
        // Normalize name and support nested folders
        $name = str_replace('\\', '/', $this->argument('name'));

        // Add "Service" suffix automatically if not present
        if (! str_ends_with($name, 'Service')) {
            $name .= 'Service';
        }

        $path      = app_path("Services/{$name}.php");
        $directory = dirname($path);

        // Auto-create nested folders if not exists
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Prevent overwriting existing file
        if (File::exists($path)) {
            $this->error("Service already exists at: {$path}");
            return;
        }

        // Extract class name and model name
        $className = pathinfo($name, PATHINFO_FILENAME);
        $modelName = str_replace('Service', '', $className);

        // Generate correct namespace (App\Services\Skills etc.)
        $namespacePath = 'App\\Services\\' . str_replace('/', '\\', dirname($this->argument('name')));
        if (str_contains($namespacePath, '.')) {
            $namespacePath = 'App\\Services';
        }

        if ($namespacePath === 'App\\Services\\.') {
            $namespacePath = 'App\\Services';
        }

        // Service class boilerplate
        $stub = <<<EOT
<?php

namespace {$namespacePath};



class {$className}
{

}
EOT;

        File::put($path, $stub);
        $this->info("Service created successfully: {$path}");
    }
}
