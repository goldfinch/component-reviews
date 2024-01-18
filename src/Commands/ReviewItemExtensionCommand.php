<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:reviewitem')]
class ReviewItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:reviewitem';

    protected $description = 'Create ReviewItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-reviews item extension';

    protected $stub = 'reviewitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
