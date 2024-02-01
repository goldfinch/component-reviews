<?php

namespace Goldfinch\Component\Reviews\Models;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use Goldfinch\Component\Reviews\Configs\ReviewConfig;

class ReviewItem extends DataObject
{
    private static $table_name = 'ReviewItem';
    private static $singular_name = 'review';
    private static $plural_name = 'reviews';

    private static $db = [
        'Text' => 'HTMLText',
        'Publisher' => 'Varchar',
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
        'Publisher' => 'Publisher',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Publisher', 'Text']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Publisher'),
                ...$fielder->media('Image'),
                $fielder->html('Text'),
                $fielder->tag('Categories'),
                $fielder
                    ->checkbox('Disabled')
                    ->setDescription('hide this item from the list'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('reviews');

        $cfg = ReviewConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }
    }
}
