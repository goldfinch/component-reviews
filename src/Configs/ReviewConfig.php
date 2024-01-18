<?php

namespace Goldfinch\Component\Reviews\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class ReviewConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'ReviewConfig';

    private static $db = [];

    public function harvest(Harvest $harvest): void
    {
        // ..
    }
}