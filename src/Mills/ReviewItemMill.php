<?php

namespace Goldfinch\Component\Reviews\Mills;

use Goldfinch\Mill\Mill;

class ReviewItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Text' => $this->faker->paragraph(10),
            'Publisher' => $this->faker->name(),
        ];
    }
}
