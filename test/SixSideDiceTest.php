<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Yatzy\SixSideDice;

class SixSideDiceTest extends TestCase {
    private function _testSide(int $sideValue, string $sideName) :void {
        $sideDiceCommonConstructor = new SixSideDice($sideValue);
        $sideDiceSemanticConstructor = SixSideDice::{'Side'.$sideName}();
        $this->assertEquals($sideDiceCommonConstructor->value(), $sideValue);
        $this->assertEquals($sideDiceSemanticConstructor->value(), $sideValue);
        $this->assertTrue($sideDiceCommonConstructor->equals($sideDiceSemanticConstructor));
        $this->assertTrue($sideDiceCommonConstructor->{'isSide'.$sideName}());
        $this->assertTrue($sideDiceSemanticConstructor->{'isSide'.$sideName}());
    }

    public function testShouldCreateSideOneCorrect() :void {
        $this->_testSide(1, 'One');
    }

    public function testShouldCreateSideTwoCorrect() :void {
        $this->_testSide(2, 'Two');
    }

    public function testShouldCreateSideThreeCorrect() :void {
        $this->_testSide(3, 'Three');
    }

    public function testShouldCreateSideFourCorrect() :void {
        $this->_testSide(4, 'Four');
    }

    public function testShouldCreateSideFiveCorrect() :void {
        $this->_testSide(5, 'Five');
    }

    public function testShouldCreateSideSixCorrect() :void {
        $this->_testSide(6, 'Six');
    }

    public function testShouldGetAllPossibleSidesCorrect() :void {
        $this->assertEquals(
            [
                SixSideDice::SideOne(),
                SixSideDice::SideTwo(),
                SixSideDice::SideThree(),
                SixSideDice::SideFour(),
                SixSideDice::SideFive(),
                SixSideDice::SideSix()
            ],
            SixSideDice::sides()
        );
    }
}
