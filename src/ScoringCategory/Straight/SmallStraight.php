<?php
namespace Yatzy\ScoringCategory\Straight;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class SmallStraight implements IScoringCategory {
    private const SCORE_FOR_ALL_DICES_FOUND = 15;
    private const SCORE_FOR_NONE_MATCHING = 0;

    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        $allDicesMustMatch = [
            SixSideDice::SideOne(),
            SixSideDice::SideTwo(),
            SixSideDice::SideThree(),
            SixSideDice::SideFour(),
            SixSideDice::SideFive(),
        ];
        $hasAllDicesMatched = array_reduce(
            $allDicesMustMatch,
            function(bool $allDicesMatch, SixSideDice $dice) :bool {
                return $allDicesMatch && $this->roll->diceOcurrences($dice);
            },
            true
        );
        return $hasAllDicesMatched? self::SCORE_FOR_ALL_DICES_FOUND: self::SCORE_FOR_NONE_MATCHING;
    }
}