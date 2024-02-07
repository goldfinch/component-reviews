<?php

namespace Goldfinch\Component\Reviews\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-reviews:ext:item')]
class ReviewItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-reviews:ext:item';

    protected $description = 'Create ReviewItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/reviewitem-extension.stub';

    protected $prefix = 'Extension';
}
