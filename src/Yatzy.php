<?php
namespace Yatzy;

use Yatzy\ScoringCategory\Chance;
use Yatzy\ScoringCategory\CountingSides\CountingOneSides;
use Yatzy\ScoringCategory\CountingSides\CountingSixSides;
use Yatzy\ScoringCategory\CountingSides\CountingTwoSides;
use Yatzy\ScoringCategory\CountingSides\CountingFiveSides;
use Yatzy\ScoringCategory\CountingSides\CountingFourSides;
use Yatzy\ScoringCategory\CountingSides\CountingThreeSides;

class Yatzy {
    private $roll;

    public function chance() :int {
        $chance = new Chance($this->roll);
        return $chance->score();
    }

    public static function yatzyScore(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $dice = [$d1, $d2, $d3, $d4, $d5];
        $counts = array_fill(0, count($dice) + 1, 0);
        foreach ($dice as $die) {
            $counts[$die - 1] += 1;
        }
        foreach (range(0, count($counts) - 1) as $i) {
            if ($counts[$i] == 5) {
                return 50;
            }
        }
        return 0;
    }

    public function ones() :int {
        $countingOneSides = new CountingOneSides($this->roll);
        return $countingOneSides->score();
    }

    public static function twos(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $roll = DicesRoll::FromSixSideDicesAsIntegerValues($d1, $d2, $d3, $d4, $d5);
        $countingOneSides = new CountingTwoSides($roll);
        return $countingOneSides->score();
    }

    public static function threes(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $roll = DicesRoll::FromSixSideDicesAsIntegerValues($d1, $d2, $d3, $d4, $d5);
        $countingOneSides = new CountingThreeSides($roll);
        return $countingOneSides->score();
    }

    public function __construct(int $d1, int $d2, int $d3, int $d4, int $d5) {
        $this->roll = DicesRoll::FromSixSideDicesAsIntegerValues($d1, $d2, $d3, $d4, $d5);
    }

    public function fours() :int {
        $countingOneSides = new CountingFourSides($this->roll);
        return $countingOneSides->score();
    }

    public function Fives() :int {
        $countingOneSides = new CountingFiveSides($this->roll);
        return $countingOneSides->score();
    }

    public function sixes() :int {
        $countingOneSides = new CountingSixSides($this->roll);
        return $countingOneSides->score();
    }

    public static function score_pair(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $counts = array_fill(0, 6, 0);
        $counts[$d1 - 1] += 1;
        $counts[$d2 - 1] += 1;
        $counts[$d3 - 1] += 1;
        $counts[$d4 - 1] += 1;
        $counts[$d5 - 1] += 1;
        for ($at = 0; $at != 6; $at++) {
            if ($counts[6 - $at - 1] == 2) {
                return (6 - $at) * 2;
            }
        }
        return 0;
    }

    public static function two_pair(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $counts = array_fill(0, 6, 0);
        $counts[$d1 - 1] += 1;
        $counts[$d2 - 1] += 1;
        $counts[$d3 - 1] += 1;
        $counts[$d4 - 1] += 1;
        $counts[$d5 - 1] += 1;
        $n = 0;
        $score = 0;
        for ($i = 0; $i != 6; $i++) {
            if ($counts[6 - $i - 1] >= 2) {
                $n = $n + 1;
                $score += (6 - $i);
            }
        }
        if ($n == 2) {
            return $score * 2;
        }
        return 0;
    }

    public static function three_of_a_kind(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $t = array_fill(0, 6, 0);
        $t[$d1 - 1] += 1;
        $t[$d2 - 1] += 1;
        $t[$d3 - 1] += 1;
        $t[$d4 - 1] += 1;
        $t[$d5 - 1] += 1;
        for ($i = 0; $i != 6; $i++) {
            if ($t[$i] >= 3) {
                return ($i + 1) * 3;
            }
        }
        return 0;
    }

    public static function smallStraight(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $tallies = array_fill(0, 6, 0);

        $tallies[$d1 - 1] += 1;
        $tallies[$d2 - 1] += 1;
        $tallies[$d3 - 1] += 1;
        $tallies[$d4 - 1] += 1;
        $tallies[$d5 - 1] += 1;
        if ($tallies[0] == 1 && $tallies[1] == 1 && $tallies[2] == 1 && $tallies[3] == 1 && $tallies[4] == 1) {
            return 15;
        }
        return 0;
    }

    public static function largeStraight(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $tallies = array_fill(0, 6, 0);
        $tallies[$d1 - 1] += 1;
        $tallies[$d2 - 1] += 1;
        $tallies[$d3 - 1] += 1;
        $tallies[$d4 - 1] += 1;
        $tallies[$d5 - 1] += 1;
        if ($tallies[1] == 1 && $tallies[2] == 1 && $tallies[3] == 1 && $tallies[4] == 1 && $tallies[5] == 1) {
            return 20;
        }
        return 0;
    }

    public static function fullHouse(int $d1, int $d2, int $d3, int $d4, int $d5) :int {
        $tallies = [];
        $_2 = false;
        $i = 0;
        $_2_at = 0;
        $_3 = False;
        $_3_at = 0;

        $tallies = array_fill(0, 6, 0);
        $tallies[$d1 - 1] += 1;
        $tallies[$d2 - 1] += 1;
        $tallies[$d3 - 1] += 1;
        $tallies[$d4 - 1] += 1;
        $tallies[$d5 - 1] += 1;

        foreach (range(0, 5) as $i) {
            if ($tallies[$i] == 2) {
                $_2 = True;
                $_2_at = $i + 1;
            }
        }

        foreach (range(0, 5) as $i) {
            if ($tallies[$i] == 3) {
                $_3 = True;
                $_3_at = $i + 1;
            }
        }

        if ($_2 && $_3) {
            return $_2_at * 2 + $_3_at * 3;
        }
        return 0;
    }
}
