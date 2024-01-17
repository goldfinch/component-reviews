<?php

namespace Goldfinch\Component\Reviews\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewsBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'ReviewsBlock';
    private static $singular_name = 'Reviews';
    private static $plural_name = 'Reviews';

    private static $db = [
        // 'BlockTitle' => 'Varchar',
        // 'BlockSubTitle' => 'Varchar',
        // 'BlockText' => 'HTMLText',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-chat';

    public function harvest(Harvest $harvest)
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
