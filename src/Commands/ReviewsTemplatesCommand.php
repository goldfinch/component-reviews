<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-reviews:templates')]
class ReviewsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:templates';

    protected $description = 'Publish [goldfinch/component-reviews] templates';

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-reviews');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-reviews/templates/Goldfinch/Component/Reviews/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Reviews/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/ReviewsBlock.ss',
                    'to' => $themePath . 'Blocks/ReviewsBlock.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}