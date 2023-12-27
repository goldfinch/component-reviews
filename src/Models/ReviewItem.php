<?php

namespace Goldfinch\Component\Reviews\Models;

use Goldfinch\Component\Reviews\Models\ReviewCategory;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\TagField\TagField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Goldfinch\ImageEditor\Forms\EditableUploadField;

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

    private static $owns = [
        'Image',
        'Categories',
    ];

    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $casting = [];
    // private static $defaults = [];

    private static $summary_fields = [
        'Author' => 'Author',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Author',
        'Text',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Image',
            'Author',
            'Text',
            'Categories',
            'Disabled',
        ]);

        // dd($fields);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...[
                    TextField::create('Author', 'Author'),
                ],
                ...EditableUploadField::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    HTMLEditorField::create('Text', 'Text'),
                    TagField::create('Categories', 'Categories', ReviewCategory::get()),
                    CheckboxField::create('Disabled','Disabled')->setDescription('hide this item from the list'),
                ],
            ]
        );

        $fields->dataFieldByName('Image')->setFolderName('reviews');

        return $fields;
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
