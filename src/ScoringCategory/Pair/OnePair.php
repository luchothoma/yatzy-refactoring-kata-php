<?php
namespace Yatzy\ScoringCategory\Pair;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class OnePair implements IScoringCategory {
    private const NUMBER_OF_ELEMENTS_OF_A_PAIR = 2;
    private const FACTOR_TO_MULTIPLY_DICE_VALUE_TO_OBTAIN_THE_SCORE = 2;

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
        foreach ($dicesAtDecsendentOrder as $dice) {
            if(!$this->_hasDiceAtLeastOnePairInRoll($dice)) {
                continue;
            }
            return $dice->value() * self::FACTOR_TO_MULTIPLY_DICE_VALUE_TO_OBTAIN_THE_SCORE;
        }
        return 0;
    }

    private function _hasDiceAtLeastOnePairInRoll(SixSideDice $dice) :bool {
        return $this->roll->diceOcurrences($dice) >= self::NUMBER_OF_ELEMENTS_OF_A_PAIR;
    }
}