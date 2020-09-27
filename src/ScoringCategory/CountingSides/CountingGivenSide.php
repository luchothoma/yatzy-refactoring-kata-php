<?php
namespace Yatzy\ScoringCategory\CountingSides;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\AbstractScoringCategory;

class CountingGivenSide extends AbstractScoringCategory {
    private $diceToCheck;
    private $valueToIncrement;

    public function __construct(DicesRoll $roll, SixSideDice $diceToCheck, int $valueToIncrement) {
        parent::__construct($roll);
        $this->diceToCheck = $diceToCheck;
        $this->valueToIncrement = $valueToIncrement;
    }

    public function score(): int {
        return $this->roll()->diceOcurrences($this->diceToCheck) * $this->valueToIncrement;
    }
}