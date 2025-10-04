<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepositoryCommand extends Command
{
    protected $signature   = 'make:repository {name : The name of the repository (e.g., User/User)}';
    protected $description = 'Create a new repository class with proper namespace and suffix';

    public function handle(): void
    {
        // Normalize name and support nested folders
        $name = str_replace('\\', '/', $this->argument('name'));

        // Add "Repository" suffix automatically if not present
        if (! str_ends_with($name, 'Repository')) {
            $name .= 'Repository';
        }

        $path      = app_path("Repositories/{$name}.php");
        $directory = dirname($path);

        // Auto-create nested folders if not exists
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Prevent overwriting existing file
        if (File::exists($path)) {
            $this->error("Repository already exists at: {$path}");
            return;
        }

        // Extract class name and model name
        $className = pathinfo($name, PATHINFO_FILENAME);
        $modelName = str_replace('Repository', '', $className);

        // Generate correct namespace (App\Repositories\Skills etc.)
        $namespacePath = 'App\\Repositories\\' . str_replace('/', '\\', dirname($this->argument('name')));
        if (str_contains($namespacePath, '.')) {
            $namespacePath = 'App\\Repositories';
        }

        if ($namespacePath === 'App\\Repositories\\.') {
            $namespacePath = 'App\\Repositories';
        }

        // Repository class boilerplate
        $stub = <<<EOT
<?php

namespace {$namespacePath};

use App\Models\\$modelName;

class {$className}
{
    public function all()
    {
        return {$modelName}::latest()->get();
    }

    public function find(\$id)
    {
        return {$modelName}::find(\$id);
    }

    public function create(array \$data)
    {
        return {$modelName}::create(\$data);
    }

    public function update({$modelName} \$model, array \$data)
    {
        \$model->update(\$data);
        return \$model;
    }

    public function delete({$modelName} \$model)
    {
        return \$model->delete();
    }
}
EOT;

        File::put($path, $stub);
        $this->info("Repository created successfully: {$path}");
    }
}
