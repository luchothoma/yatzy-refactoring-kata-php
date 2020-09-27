<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Yatzy\SixSideDice;

class SixSideDiceTest extends TestCase {
    public function testShouldCreateSideOneCorrectly() :void {
        $sideOneDiceValue = 1;
        $sideOneDiceCommonConstructor = new SixSideDice($sideOneDiceValue);
        $sideOneDiceSemanticConstructor = SixSideDice::SideOne();
        $this->assertEquals($sideOneDiceCommonConstructor->value(), $sideOneDiceValue);
        $this->assertEquals($sideOneDiceSemanticConstructor->value(), $sideOneDiceValue);
        $this->assertTrue($sideOneDiceCommonConstructor->equals($sideOneDiceSemanticConstructor));
        $this->assertTrue($sideOneDiceCommonConstructor->isSideOne());
        $this->assertTrue($sideOneDiceSemanticConstructor->isSideOne());
    }

    public function testShouldCreateSideTwoCorrectly() :void {
        $sideTwoDiceValue = 2;
        $sideTwoDiceCommonConstructor = new SixSideDice($sideTwoDiceValue);
        $sideTwoDiceSemanticConstructor = SixSideDice::SideTwo();
        $this->assertEquals($sideTwoDiceCommonConstructor->value(), $sideTwoDiceValue);
        $this->assertEquals($sideTwoDiceSemanticConstructor->value(), $sideTwoDiceValue);
        $this->assertTrue($sideTwoDiceCommonConstructor->equals($sideTwoDiceSemanticConstructor));
        $this->assertTrue($sideTwoDiceCommonConstructor->isSideTwo());
        $this->assertTrue($sideTwoDiceSemanticConstructor->isSideTwo());
    }

    public function testShouldCreateSideThreeCorrectly() :void {
        $sideThreeDiceValue = 3;
        $sideThreeDiceCommonConstructor = new SixSideDice($sideThreeDiceValue);
        $sideThreeDiceSemanticConstructor = SixSideDice::SideThree();
        $this->assertEquals($sideThreeDiceCommonConstructor->value(), $sideThreeDiceValue);
        $this->assertEquals($sideThreeDiceSemanticConstructor->value(), $sideThreeDiceValue);
        $this->assertTrue($sideThreeDiceCommonConstructor->equals($sideThreeDiceSemanticConstructor));
        $this->assertTrue($sideThreeDiceCommonConstructor->isSideThree());
        $this->assertTrue($sideThreeDiceSemanticConstructor->isSideThree());
    }

    public function testShouldCreateSideFourCorrectly() :void {
        $sideFourDiceValue = 4;
        $sideFourDiceCommonConstructor = new SixSideDice($sideFourDiceValue);
        $sideFourDiceSemanticConstructor = SixSideDice::SideFour();
        $this->assertEquals($sideFourDiceCommonConstructor->value(), $sideFourDiceValue);
        $this->assertEquals($sideFourDiceSemanticConstructor->value(), $sideFourDiceValue);
        $this->assertTrue($sideFourDiceCommonConstructor->equals($sideFourDiceSemanticConstructor));
        $this->assertTrue($sideFourDiceCommonConstructor->isSideFour());
        $this->assertTrue($sideFourDiceSemanticConstructor->isSideFour());
    }

    public function testShouldCreateSideFiveCorrectly() :void {
        $sideFiveDiceValue = 5;
        $sideFiveDiceCommonConstructor = new SixSideDice($sideFiveDiceValue);
        $sideFiveDiceSemanticConstructor = SixSideDice::SideFive();
        $this->assertEquals($sideFiveDiceCommonConstructor->value(), $sideFiveDiceValue);
        $this->assertEquals($sideFiveDiceSemanticConstructor->value(), $sideFiveDiceValue);
        $this->assertTrue($sideFiveDiceCommonConstructor->equals($sideFiveDiceSemanticConstructor));
        $this->assertTrue($sideFiveDiceCommonConstructor->isSideFive());
        $this->assertTrue($sideFiveDiceSemanticConstructor->isSideFive());
    }

    public function testShouldCreateSideSixCorrectly() :void {
        $sideSixDiceValue = 6;
        $sideSixDiceCommonConstructor = new SixSideDice($sideSixDiceValue);
        $sideSixDiceSemanticConstructor = SixSideDice::SideSix();
        $this->assertEquals($sideSixDiceCommonConstructor->value(), $sideSixDiceValue);
        $this->assertEquals($sideSixDiceSemanticConstructor->value(), $sideSixDiceValue);
        $this->assertTrue($sideSixDiceCommonConstructor->equals($sideSixDiceSemanticConstructor));
        $this->assertTrue($sideSixDiceCommonConstructor->isSideSix());
        $this->assertTrue($sideSixDiceSemanticConstructor->isSideSix());
    }
}
