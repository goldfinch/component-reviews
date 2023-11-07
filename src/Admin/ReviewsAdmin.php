<?php

namespace Goldfinch\Component\Reviews\Admin;

use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Blocks\ReviewsBlock;
use Goldfinch\Component\Reviews\Configs\ReviewConfig;
use Goldfinch\Component\Reviews\Models\ReviewCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class ReviewsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'reviews';
    private static $menu_title = 'Reviews';
    private static $menu_icon_class = 'bi-chat-square-quote-fill';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ReviewItem::class => [
            'title'=> 'Reviews',
        ],
        ReviewCategory::class => [
            'title'=> 'Categories',
        ],
        ReviewsBlock::class => [
            'title'=> 'Blocks',
        ],
        ReviewConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
