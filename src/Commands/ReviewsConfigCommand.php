<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-reviews:config')]
class ReviewsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:config';

    protected $description = 'Create Reviews YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
