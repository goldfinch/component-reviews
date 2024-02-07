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
        $command = $this->getApplication()->find('vendor:component-reviews:ext:admin');
        $command->run(new ArrayInput(['name' => 'ReviewsAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:ext:config');
        $command->run(new ArrayInput(['name' => 'ReviewConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:ext:block');
        $command->run(new ArrayInput(['name' => 'ReviewsBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:ext:item');
        $command->run(new ArrayInput(['name' => 'ReviewItem']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:ext:category');
        $command->run(new ArrayInput(['name' => 'ReviewCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:config');
        $command->run(new ArrayInput(['name' => 'component-reviews']), $output);

        $command = $this->getApplication()->find('vendor:component-reviews:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
