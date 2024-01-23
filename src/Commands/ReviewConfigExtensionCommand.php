<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:ext:config')]
class ReviewConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:ext:config';

    protected $description = 'Create ReviewConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/reviewconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
