<?php
namespace Yatzy\ScoringCategory\Pair;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class TwoPair implements IScoringCategory {
    private const NUMBER_OF_ELEMENTS_OF_A_PAIR = 2;
    private const FACTOR_TO_MULTIPLY_DICE_VALUE_TO_OBTAIN_THE_SCORE = 2;
    private const PAIRS_TO_FIND = 2;

    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        $dicesAtDecsendentOrder = [
            SixSideDice::SideSix(),
            SixSideDice::SideFive(),
            SixSideDice::SideFour(),
            SixSideDice::SideThree(),
            SixSideDice::SideTwo(),
            SixSideDice::SideOne(),
        ];
        $score = 0;
        $pairsFound = 0;
        foreach ($dicesAtDecsendentOrder as $dice) {
            if($this->_hasDiceAtLeastOnePairInRoll($dice) && $pairsFound < self::PAIRS_TO_FIND) {
                $pairsFound++;
                $score += $dice->value() * self::FACTOR_TO_MULTIPLY_DICE_VALUE_TO_OBTAIN_THE_SCORE;
            }
        }
        return $pairsFound === self::PAIRS_TO_FIND? $score: 0;
    }

    private function _hasDiceAtLeastOnePairInRoll(SixSideDice $dice) :bool {
        return $this->roll->diceOcurrences($dice) >= self::NUMBER_OF_ELEMENTS_OF_A_PAIR;
    }
}