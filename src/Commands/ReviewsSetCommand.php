<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-reviews')]
class ReviewsSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews';

    protected $description = 'Set of all [goldfinch/component-reviews] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-reviews:ext:admin',
        );
        $input = new ArrayInput(['name' => 'ReviewsAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews:ext:config',
        );
        $input = new ArrayInput(['name' => 'ReviewConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews:ext:block',
        );
        $input = new ArrayInput(['name' => 'ReviewsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews:ext:item',
        );
        $input = new ArrayInput(['name' => 'ReviewItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews:ext:category',
        );
        $input = new ArrayInput(['name' => 'ReviewCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-reviews:config');
        $input = new ArrayInput(['name' => 'component-reviews']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
