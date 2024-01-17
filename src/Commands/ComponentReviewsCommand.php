<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-reviews')]
class ComponentReviewsCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews';

    protected $description = 'Populate goldfinch/component-reviews components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-reviews-reviewitem',
        );
        $input = new ArrayInput(['name' => 'ReviewItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews-reviewcategory',
        );
        $input = new ArrayInput(['name' => 'ReviewCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews-reviewconfig',
        );
        $input = new ArrayInput(['name' => 'ReviewConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-reviews-reviewsblock',
        );
        $input = new ArrayInput(['name' => 'ReviewsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'templates:component-reviews',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-reviews');
        $input = new ArrayInput(['name' => 'component-reviews']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
