<?php

namespace Goldfinch\Component\Reviews\Models;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class ReviewItem extends DataObject
{
    private static $table_name = 'ReviewItem';
    private static $singular_name = 'review';
    private static $plural_name = 'reviews';

    private static $db = [
        'Text' => 'HTMLText',
        'Author' => 'Varchar',
        'Disabled' => 'Boolean',
    ];

    private static $many_many = [
        'Categories' => ReviewCategory::class,
    ];
    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Author' => 'Author',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->require(['Author', 'Text']);

        $harvest->fields([
            'Root.Main' => [
                $harvest->string('Author'),
                ...$harvest->media('Image'),
                $harvest->html('Text'),
                $harvest->tag('Categories'),
                $harvest
                    ->checkbox('Disabled')
                    ->setDescription('hide this item from the list'),
            ],
        ]);

        $harvest->dataField('Image')->setFolderName('reviews');
    }
}
