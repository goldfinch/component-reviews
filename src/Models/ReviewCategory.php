<?php

namespace Goldfinch\Component\Reviews\Models;

use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;

class ReviewCategory extends DataObject
{
    use Millable;

    private static $table_name = 'ReviewCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $belongs_many_many = [
        'Items' => ReviewItem::class,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Items.Count' => 'Reviews',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);

        return $fields;
    }
}
