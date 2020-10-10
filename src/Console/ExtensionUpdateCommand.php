<?php

namespace Dcat\Admin\Console;

use Dcat\Admin\Admin;
use Illuminate\Console\Command;

class ExtensionUpdateCommand extends Command
{
    protected $signature = 'admin:extension-update 
    {name : The name of the extension. Eg: author-name/extension-name}
    {--ver= : If this parameter is specified, the process will stop on the specified version, if not, it will update to the latest version. Example: 1.3.9}';

    protected $description = 'Update an existing extension.';

    public function handle()
    {
        $name = $this->argument('name');
        $version = $this->option('ver');

        Admin::extension()->load();

        Admin::extension()
            ->updateManager()
            ->setOutPut($this->output)
            ->update($name, $version);
    }


}
