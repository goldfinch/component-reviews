<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-reviews:ext:block')]
class ReviewsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:ext:block';

    protected $description = 'Create ReviewsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/reviewsblock-extension.stub';

    protected $prefix = 'Extension';
}
