<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:reviewconfig')]
class ReviewConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:reviewconfig';

    protected $description = 'Create ReviewConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-reviews config extension';

    protected $stub = 'reviewconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
