<?php

namespace Goldfinch\Component\Reviews\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Reviews\Models\ReviewItem;
use Goldfinch\Component\Reviews\Blocks\ReviewsBlock;
use Goldfinch\Component\Reviews\Models\ReviewCategory;

class ReviewsHarvest extends Harvest
{
    public static function run(): void
    {
        ReviewCategory::mill(5)->make();

        ReviewItem::mill(30)->make()->each(function($item) {
            $categories = ReviewCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                ReviewsBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Reviews',
                ]);
            }
        }
    }
}
