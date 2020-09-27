<?php
namespace Yatzy\ScoringCategory;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;

final class MatchLine implements IScoringCategory {
    private const SCORE_FOUND_5_MATCHES_FOR_DICE = 50;
    private const SCORE_NOT_FOUND_ANY_5_MATCHES_FOR_DICE = 0;

    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        $allPossibleDiceSides = SixSideDice::sides();
        foreach ($allPossibleDiceSides as $dice) {
            if($this->_allRollDicesAreEqualToThisDice($dice)) {
                return self::SCORE_FOUND_5_MATCHES_FOR_DICE;
            }
        }
        return self::SCORE_NOT_FOUND_ANY_5_MATCHES_FOR_DICE;
    }

    private function _allRollDicesAreEqualToThisDice(SixSideDice $diceToMatch) :bool {
        $totalNumberOfRollDices = count($this->roll->toArray());
        return $totalNumberOfRollDices === $this->roll->diceOcurrences($diceToMatch); 
    }
}