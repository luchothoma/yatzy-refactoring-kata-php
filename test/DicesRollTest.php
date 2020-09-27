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
}
