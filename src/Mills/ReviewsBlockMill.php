<?php

namespace Goldfinch\Component\Reviews\Mills;

use Goldfinch\Mill\Mill;

class ReviewsBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
