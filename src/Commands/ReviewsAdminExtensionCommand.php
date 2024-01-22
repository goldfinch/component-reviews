<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-reviews:ext:admin')]
class ReviewsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:ext:admin';

    protected $description = 'Create ReviewsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/reviewsadmin-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
