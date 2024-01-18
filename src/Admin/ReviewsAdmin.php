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
}
