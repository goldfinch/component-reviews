<?php

namespace Goldfinch\Component\Reviews\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewsBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'ReviewsBlock';
    private static $singular_name = 'Review';
    private static $plural_name = 'Reviews';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-chat';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function Items()
    {
        return ReviewItem::get();
    }

    public function Categories()
    {
        return ReviewCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
