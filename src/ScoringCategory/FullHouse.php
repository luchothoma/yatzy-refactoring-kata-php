<?php
namespace Yatzy\ScoringCategory;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class FullHouse implements IScoringCategory {
    private const THREE_OCCURENCES = 3;
    private const TWO_OCCURENCES = 2;
    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        $diceWithThreeMatches = null;
        $diceWithTwoMatches = null;
        foreach (SixSideDice::sides() as $dice) {
            if($this->roll->diceOcurrences($dice) == self::THREE_OCCURENCES) {
                $diceWithThreeMatches = $dice;
                continue;
            }
            if($this->roll->diceOcurrences($dice) == self::TWO_OCCURENCES) {
                $diceWithTwoMatches = $dice;
                continue;
            }
        }
        
        if(is_null($diceWithThreeMatches) || is_null($diceWithTwoMatches)) {
            return 0;
        }

        return $diceWithThreeMatches->value() * self::THREE_OCCURENCES + $diceWithTwoMatches->value() * self::TWO_OCCURENCES;
    }
}