<?php
namespace Yatzy\ScoringCategory;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class Chance implements IScoringCategory {
    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        return array_reduce(
            $this->roll->toArray(),
            function(int $score, SixSideDice $actualDice) :int {
                return $score + $actualDice->value();
            },
            0
        );
    }
}