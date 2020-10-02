<?php
namespace Yatzy;

use Yatzy\ScoringCategory\Chance;
use Yatzy\ScoringCategory\FullHouse;
use Yatzy\ScoringCategory\MatchLine;
use Yatzy\ScoringCategory\ThreeOfKind;
use Yatzy\ScoringCategory\Pair\OnePair;
use Yatzy\ScoringCategory\Pair\TwoPair;
use Yatzy\ScoringCategory\Straight\LargeStraight;
use Yatzy\ScoringCategory\Straight\SmallStraight;
use Yatzy\ScoringCategory\CountingSides\CountingOneSides;
use Yatzy\ScoringCategory\CountingSides\CountingSixSides;
use Yatzy\ScoringCategory\CountingSides\CountingTwoSides;
use Yatzy\ScoringCategory\CountingSides\CountingFiveSides;
use Yatzy\ScoringCategory\CountingSides\CountingFourSides;
use Yatzy\ScoringCategory\CountingSides\CountingThreeSides;

class YatzyGame {
    private $roll;

    public function __construct(int $d1, int $d2, int $d3, int $d4, int $d5) {
        $this->roll = DicesRoll::FromSixSideDicesAsIntegerValues($d1, $d2, $d3, $d4, $d5);
    }

    public function ones() :int {
        $countingOneSides = new CountingOneSides($this->roll);
        return $countingOneSides->score();
    }

    public function twos() :int {
        $countingOneSides = new CountingTwoSides($this->roll);
        return $countingOneSides->score();
    }

    public function threes() :int {
        $countingOneSides = new CountingThreeSides($this->roll);
        return $countingOneSides->score();
    }

    public function fours() :int {
        $countingOneSides = new CountingFourSides($this->roll);
        return $countingOneSides->score();
    }

    public function fives() :int {
        $countingOneSides = new CountingFiveSides($this->roll);
        return $countingOneSides->score();
    }

    public function sixes() :int {
        $countingOneSides = new CountingSixSides($this->roll);
        return $countingOneSides->score();
    }

    public function chance() :int {
        $chance = new Chance($this->roll);
        return $chance->score();
    }

    public function yatzyScore() :int {
        $matchsInLine = new MatchLine($this->roll);
        return $matchsInLine->score();
    }

    public function onePair() :int {
        $onePair = new OnePair($this->roll);
        return $onePair->score();
    }

    public function twoPair() :int {
        $twoPair = new TwoPair($this->roll);
        return $twoPair->score();
    }

    public function threeOfKind() :int {
        $threeOfKind = new ThreeOfKind($this->roll);
        return $threeOfKind->score();
    }

    public function smallStraight() :int {
        $smallStraight = new SmallStraight($this->roll);
        return $smallStraight->score();
    }

    public function largeStraight() :int {
        $largeStraight = new LargeStraight($this->roll);
        return $largeStraight->score();
    }

    public function fullHouse() :int {
        $fullHouse = new FullHouse($this->roll);
        return $fullHouse->score();
    }
}
