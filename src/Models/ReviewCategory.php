<?php

namespace Goldfinch\Component\Reviews\Models;

use Goldfinch\Harvest\Harvest;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;

class ReviewCategory extends DataObject
{
    use HarvestTrait;

    private static $table_name = 'ReviewCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $belongs_many_many = [
        'Items' => ReviewItem::class,
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [$harvest->string('Title')],
        ]);
    }
}
