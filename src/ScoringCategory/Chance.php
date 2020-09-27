<?php
namespace Yatzy\ScoringCategory;

use Yatzy\SixSideDice;

class Chance extends AbstractScoringCategory {
    public function score(): int {
        return array_reduce(
            $this->roll()->toArray(),
            function(int $score, SixSideDice $actualDice) :int {
                return $score + $actualDice->value();
            },
            0
        );
    }
}