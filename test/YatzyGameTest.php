<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Yatzy\YatzyGame;

class YatzyGameTest extends TestCase
{

    public function test_chance_scores_sum_of_all_dice()
    {
        $this->assertEquals(15, (new YatzyGame(2, 3, 4, 5, 1))->chance());
        $this->assertEquals(16, (new YatzyGame(3, 3, 4, 5, 1))->chance());
    }

    public function test_yatzy_scores_50()
    {
        $this->assertEquals(50, (new YatzyGame(4, 4, 4, 4, 4))->yatzyScore());
        $this->assertEquals(50, (new YatzyGame(6, 6, 6, 6, 6))->yatzyScore());
        $this->assertEquals(0, (new YatzyGame(6, 6, 6, 6, 3))->yatzyScore());
    }

    public function test_1s()
    {
        $this->assertEquals(1, (new YatzyGame(1, 2, 3, 4, 5))->ones());
        $this->assertEquals(2, (new YatzyGame(1, 2, 1, 4, 5))->ones());
        $this->assertEquals(0, (new YatzyGame(6, 2, 2, 4, 5))->ones());
        $this->assertEquals(4, (new YatzyGame(1, 2, 1, 1, 1))->ones());
    }

    public function test_2s()
    {
        $this->assertEquals(4, (new YatzyGame(1, 2, 3, 2, 6))->twos());
        $this->assertEquals(10, (new YatzyGame(2, 2, 2, 2, 2))->twos());
    }

    public function test_threes()
    {
        $this->assertEquals(6, (new YatzyGame(1, 2, 3, 2, 3))->threes());
        $this->assertEquals(12, (new YatzyGame(2, 3, 3, 3, 3))->threes());
    }

    public function test_fours_test()
    {
        $this->assertEquals(12, (new YatzyGame(4, 4, 4, 5, 5))->fours());
        $this->assertEquals(8, (new YatzyGame(4, 4, 5, 5, 5))->fours());
        $this->assertEquals(4, (new YatzyGame(4, 5, 5, 5, 5))->fours());
    }

    public function test_fives()
    {
        $this->assertEquals(10, (new YatzyGame(4, 4, 4, 5, 5))->fives());
        $this->assertEquals(15, (new YatzyGame(4, 4, 5, 5, 5))->fives());
        $this->assertEquals(20, (new YatzyGame(4, 5, 5, 5, 5))->fives());
    }

    public function sixes_test()
    {
        $this->assertEquals(0, (new YatzyGame(4, 4, 4, 5, 5))->sixes());
        $this->assertEquals(6, (new YatzyGame(4, 4, 6, 5, 5))->sixes());
        $this->assertEquals(18, (new YatzyGame(6, 5, 6, 6, 5))->sixes());
    }

    public function test_one_pair()
    {
        $this->assertEquals(6, (new YatzyGame(3, 4, 3, 5, 6))->onePair());
        $this->assertEquals(10, (new YatzyGame(5, 3, 3, 3, 5))->onePair());
        $this->assertEquals(12, (new YatzyGame(5, 3, 6, 6, 5))->onePair());
    }

    public function test_two_Pair()
    {
        $this->assertEquals(16, (new YatzyGame(3, 3, 5, 4, 5))->twoPair());
        $this->assertEquals(18, (new YatzyGame(3, 3, 6, 6, 6))->twoPair());
        $this->assertEquals(0, (new YatzyGame(3, 3, 6, 5, 4))->twoPair());
    }

    public function test_three_of_a_kind()
    {
        $this->assertEquals(9, (new YatzyGame(3, 3, 3, 4, 5))->threeOfKind());
        $this->assertEquals(15, (new YatzyGame(5, 3, 5, 4, 5))->threeOfKind());
        $this->assertEquals(9, (new YatzyGame(3, 3, 3, 2, 1))->threeOfKind());
        $this->assertEquals(9, (new YatzyGame(3, 3, 3, 2, 1))->threeOfKind());
        $this->assertEquals(9, (new YatzyGame(3, 3, 3, 2, 3))->threeOfKind());
        $this->assertEquals(9, (new YatzyGame(3, 3, 3, 3, 3))->threeOfKind());
        $this->assertEquals(0, (new YatzyGame(1, 2, 3, 4, 5))->threeOfKind());
        $this->assertEquals(0, (new YatzyGame(1, 1, 2, 3, 3))->threeOfKind());
    }

    public function test_smallStraight()
    {
        $this->assertEquals(15, (new YatzyGame(1, 2, 3, 4, 5))->smallStraight());
        $this->assertEquals(15, (new YatzyGame(2, 3, 4, 5, 1))->smallStraight());
        $this->assertEquals(0, (new YatzyGame(1, 2, 2, 4, 5))->smallStraight());
    }

    public function test_largeStraight()
    {
        $this->assertEquals(20, (new YatzyGame(6, 2, 3, 4, 5))->largeStraight());
        $this->assertEquals(20, (new YatzyGame(2, 3, 4, 5, 6))->largeStraight());
        $this->assertEquals(0, (new YatzyGame(1, 2, 2, 4, 5))->largeStraight());
    }

    public function test_fullHouse()
    {
        $this->assertEquals(18, (new YatzyGame(6, 2, 2, 2, 6))->fullHouse());
        $this->assertEquals(0, (new YatzyGame(2, 3, 4, 5, 6))->fullHouse());
        $this->assertEquals(0, (new YatzyGame(2, 3, 2, 3, 6))->fullHouse());
        $this->assertEquals(12, (new YatzyGame(2, 3, 2, 3, 2))->fullHouse());
        $this->assertEquals(0, (new YatzyGame(2, 3, 2, 2, 2))->fullHouse());
        $this->assertEquals(0, (new YatzyGame(5, 5, 5, 5, 5))->fullHouse());
        $this->assertEquals(0, (new YatzyGame(4, 5, 5, 5, 3))->fullHouse());
        $this->assertEquals(27, (new YatzyGame(6, 5, 5, 5, 6))->fullHouse());
    }
}
