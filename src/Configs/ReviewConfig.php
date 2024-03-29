<?php

namespace Goldfinch\Component\Reviews\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class ReviewConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'ReviewConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
            ],
        ]);

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }
}
