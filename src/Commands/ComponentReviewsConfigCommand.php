<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'config:component-reviews')]
class ComponentReviewsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'config:component-reviews';

    protected $description = 'Create component-reviews config';

    protected $path = 'app/_config';

    protected $type = 'component-reviews yml config';

    protected $stub = 'reviewconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
