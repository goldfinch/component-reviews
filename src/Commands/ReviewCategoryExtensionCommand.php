<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:reviewcategory')]
class ReviewCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:reviewcategory';

    protected $description = 'Create ReviewCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-reviews category extension';

    protected $stub = 'reviewcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
