<?php

namespace Goldfinch\Component\Reviews\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Blocks\ReviewsBlock;
use Goldfinch\Component\Reviews\Configs\ReviewConfig;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'reviews';
    private static $menu_title = 'Reviews';
    private static $menu_icon_class = 'font-icon-chat';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ReviewItem::class => [
            'title' => 'Reviews',
        ],
        ReviewCategory::class => [
            'title' => 'Categories',
        ],
        ReviewsBlock::class => [
            'title' => 'Blocks',
        ],
        ReviewConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = ReviewConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($models[ReviewCategory::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[ReviewsBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[ReviewConfig::class]);
        }

        return $models;
    }
}
