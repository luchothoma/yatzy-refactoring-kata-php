<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Yatzy\Yatzy;

class YatzyTest extends TestCase
{

    public function test_chance_scores_sum_of_all_dice()
    {
        $this->assertEquals(15, (new Yatzy(2, 3, 4, 5, 1))->chance());
        $this->assertEquals(16, (new Yatzy(3, 3, 4, 5, 1))->chance());
    }

    public function test_yatzy_scores_50()
    {
        $this->assertEquals(50, (new Yatzy(4, 4, 4, 4, 4))->yatzyScore());
        $this->assertEquals(50, (new Yatzy(6, 6, 6, 6, 6))->yatzyScore());
        $this->assertEquals(0, (new Yatzy(6, 6, 6, 6, 3))->yatzyScore());
    }

    public function test_1s()
    {
        $this->assertEquals(1, (new Yatzy(1, 2, 3, 4, 5))->ones());
        $this->assertEquals(2, (new Yatzy(1, 2, 1, 4, 5))->ones());
        $this->assertEquals(0, (new Yatzy(6, 2, 2, 4, 5))->ones());
        $this->assertEquals(4, (new Yatzy(1, 2, 1, 1, 1))->ones());
    }

    public function test_2s()
    {
        $this->assertEquals(4, (new Yatzy(1, 2, 3, 2, 6))->twos());
        $this->assertEquals(10, (new Yatzy(2, 2, 2, 2, 2))->twos());
    }

    public function test_threes()
    {
        $this->assertEquals(6, (new Yatzy(1, 2, 3, 2, 3))->threes());
        $this->assertEquals(12, (new Yatzy(2, 3, 3, 3, 3))->threes());
    }

    public function test_fours_test()
    {
        $this->assertEquals(12, (new Yatzy(4, 4, 4, 5, 5))->fours());
        $this->assertEquals(8, (new Yatzy(4, 4, 5, 5, 5))->fours());
        $this->assertEquals(4, (new Yatzy(4, 5, 5, 5, 5))->fours());
    }

    public function test_fives()
    {
        $this->assertEquals(10, (new Yatzy(4, 4, 4, 5, 5))->fives());
        $this->assertEquals(15, (new Yatzy(4, 4, 5, 5, 5))->fives());
        $this->assertEquals(20, (new Yatzy(4, 5, 5, 5, 5))->fives());
    }

    public function sixes_test()
    {
        $this->assertEquals(0, (new Yatzy(4, 4, 4, 5, 5))->sixes());
        $this->assertEquals(6, (new Yatzy(4, 4, 6, 5, 5))->sixes());
        $this->assertEquals(18, (new Yatzy(6, 5, 6, 6, 5))->sixes());
    }

    public function test_one_pair()
    {
        $this->assertEquals(6, (new Yatzy(3, 4, 3, 5, 6))->onePair());
        $this->assertEquals(10, (new Yatzy(5, 3, 3, 3, 5))->onePair());
        $this->assertEquals(12, (new Yatzy(5, 3, 6, 6, 5))->onePair());
    }

    public function test_two_Pair()
    {
        $this->assertEquals(16, (new Yatzy(3, 3, 5, 4, 5))->twoPair());
        $this->assertEquals(18, (new Yatzy(3, 3, 6, 6, 6))->twoPair());
        $this->assertEquals(0, (new Yatzy(3, 3, 6, 5, 4))->twoPair());
    }

    public function test_three_of_a_kind()
    {
        $this->assertEquals(9, Yatzy::threeOfKind(3, 3, 3, 4, 5));
        $this->assertEquals(15, Yatzy::threeOfKind(5, 3, 5, 4, 5));
        $this->assertEquals(9, Yatzy::threeOfKind(3, 3, 3, 2, 1));
    }

    public function test_smallStraight()
    {
        $this->assertEquals(15, Yatzy::smallStraight(1, 2, 3, 4, 5));
        $this->assertEquals(15, Yatzy::smallStraight(2, 3, 4, 5, 1));
        $this->assertEquals(0, Yatzy::smallStraight(1, 2, 2, 4, 5));
    }

    public function test_largeStraight()
    {
        $this->assertEquals(20, Yatzy::largeStraight(6, 2, 3, 4, 5));
        $this->assertEquals(20, Yatzy::largeStraight(2, 3, 4, 5, 6));
        $this->assertEquals(0, Yatzy::largeStraight(1, 2, 2, 4, 5));
    }

    public function test_fullHouse()
    {
        $this->assertEquals(18, Yatzy::fullHouse(6, 2, 2, 2, 6));
        $this->assertEquals(0, Yatzy::fullHouse(2, 3, 4, 5, 6));
    }
}
