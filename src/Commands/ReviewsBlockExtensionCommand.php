<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:reviewsblock')]
class ReviewsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:reviewsblock';

    protected $description = 'Create ReviewsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-reviews block extension';

    protected $stub = 'reviewsblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
