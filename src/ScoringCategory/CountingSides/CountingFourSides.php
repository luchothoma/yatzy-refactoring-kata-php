<?php
namespace Yatzy\ScoringCategory\CountingSides;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\CountingSides\CountingGivenSide;

class CountingFourSides extends CountingGivenSide {
    public function __construct(DicesRoll $roll) {
        parent::__construct($roll, SixSideDice::SideFour(), 4);
    }
}