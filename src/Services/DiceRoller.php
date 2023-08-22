<?php

namespace App\Services;

class DiceRoller
{
    public function roll(int $dices = 1, int $faces = 6): array
    {
        $rolls = [];

        for ($i = 1; $i <= $dices; $i++) {
            $rolls[] = mt_rand(1, $faces);
        }

        return $rolls;
    }
}
