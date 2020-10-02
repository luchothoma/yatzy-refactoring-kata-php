<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Yatzy\DicesRoll;
use Yatzy\SixSideDice;

class DicesRollTest extends TestCase {
    private function _getDicesToCreateTheRoll() :array {
        return [
            1 => SixSideDice::SideOne(),
            2 => SixSideDice::SideTwo(),
            3 => SixSideDice::SideThree(),
            4 => SixSideDice::SideFour(),
            5 => SixSideDice::SideFive(),
        ];
    }

    private function _getRoll() :DicesRoll {
        return  new DicesRoll(...$this->_getDicesToCreateTheRoll());
    }

    private function _getRollFromIntegersValues(int ...$diceIntegerValues) :DicesRoll {
        return DicesRoll::FromSixSideDicesAsIntegerValues(...$diceIntegerValues);
    }

    public function testShouldCreateRollCorrect() :void {
        $roll = $this->_getRoll();
        $this->assertTrue(SixSideDice::SideOne()->equals($roll->positionOne()));
        $this->assertTrue(SixSideDice::SideTwo()->equals($roll->positionTwo()));
        $this->assertTrue(SixSideDice::SideThree()->equals($roll->positionThree()));
        $this->assertTrue(SixSideDice::SideFour()->equals($roll->positionFour()));
        $this->assertTrue(SixSideDice::SideFive()->equals($roll->positionFive()));
    }

    public function testShouldVerifyConversionToArrayIsCorrect() :void {
        $roll = $this->_getRoll();
        $this->assertEquals($this->_getDicesToCreateTheRoll(), $roll->toArray());
    }

    public function testShouldVerifyRollIterationIsCorrect() :void {
        $roll = $this->_getRoll();
        foreach ($roll as $integerPosition => $diceOfPosition) {
            $this->assertTrue($this->_getDicesToCreateTheRoll()[$integerPosition]->equals($diceOfPosition));
        }
    }

    public function testShouldCountOccurencesCorrect() :void {        
        $this->assertEquals(0, $this->_getRollFromIntegersValues(2,2,2,2,2)->diceOcurrences(SixSideDice::SideOne()));
        $this->assertEquals(1, $this->_getRollFromIntegersValues(1,2,3,4,5)->diceOcurrences(SixSideDice::SideTwo()));
        $this->assertEquals(2, $this->_getRollFromIntegersValues(3,3,1,1,1)->diceOcurrences(SixSideDice::SideThree()));
        $this->assertEquals(3, $this->_getRollFromIntegersValues(4,1,1,4,4)->diceOcurrences(SixSideDice::SideFour()));
        $this->assertEquals(4, $this->_getRollFromIntegersValues(5,5,1,5,5)->diceOcurrences(SixSideDice::SideFive()));
        $this->assertEquals(5, $this->_getRollFromIntegersValues(6,6,6,6,6)->diceOcurrences(SixSideDice::SideSix()));
    }
}
