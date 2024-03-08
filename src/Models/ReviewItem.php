<?php

namespace Goldfinch\Component\Reviews\Models;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Reviews\Configs\ReviewConfig;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewItem extends DataObject
{
    use Millable;

    private static $table_name = 'ReviewItem';
    private static $singular_name = 'review';
    private static $plural_name = 'reviews';

    private static $db = [
        'Text' => 'HTMLText',
        'Publisher' => 'Varchar',
        'Disabled' => 'Boolean',
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $many_many = [
        'Categories' => ReviewCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Publisher' => 'Publisher',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
        'Categories.Count' => 'Categories',
    ];

    private static $urlsegment_source = 'Publisher';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->required(['Publisher', 'Text']);

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

        return $fields;
    }
}
