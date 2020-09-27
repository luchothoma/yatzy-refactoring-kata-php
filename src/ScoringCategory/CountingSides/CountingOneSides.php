<?php
namespace Yatzy\ScoringCategory\CountingSides;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class CountingOneSides implements IScoringCategory {
    private const VALUE_TO_INCREMENT = 1;
    
    private $roll;
    private $diceToCheck;
    
    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
        $this->diceToCheck = SixSideDice::SideOne();
    }

    public function score(): int {
        return $this->roll->diceOcurrences($this->diceToCheck) * self::VALUE_TO_INCREMENT;
    }
}