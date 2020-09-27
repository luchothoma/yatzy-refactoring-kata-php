<?php
namespace Yatzy\ScoringCategory;

use Yatzy\DicesRoll;

abstract class AbstractScoringCategory implements IScoringCategory {
    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function roll() :DicesRoll {
        return $this->roll;
    }
}