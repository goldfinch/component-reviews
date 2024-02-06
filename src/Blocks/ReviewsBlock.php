<?php

namespace Goldfinch\Component\Reviews\Blocks;

use Goldfinch\Blocks\Models\BlockElement;
use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewsBlock extends BlockElement
{
    private static $table_name = 'ReviewsBlock';
    private static $singular_name = 'Review';
    private static $plural_name = 'Reviews';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-chat';

    public function Items()
    {
        return ReviewItem::get();
    }

    public function Categories()
    {
        return ReviewCategory::get();
    }
}
