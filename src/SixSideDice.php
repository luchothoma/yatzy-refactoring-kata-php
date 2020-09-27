<?php
namespace Yatzy;

use InvalidArgumentException;

final class SixSideDice {
    private $value = 0;

    public function __construct(int $value) {
        $this->_isValidSideValueOrThrow($value);
        $this->value = $value;
    }

    private function _isValidSideValueOrThrow(int $value) :void {
        if($value < 1 or $value > 6) {
            throw new InvalidArgumentException("The value given ({$value}) to initialice the Six Side Dice it is not valid, must be a integer number between 1 and 6.");
        }
    }

    public static function SideOne() :self {
        return new self(1);
    }

    public static function SideTwo() :self {
        return new self(2);
    }

    public static function SideThree() :self {
        return new self(3);
    }

    public static function SideFour() :self {
        return new self(4);
    }

    public static function SideFive() :self {
        return new self(5);
    }

    public static function SideSix() :self {
        return new self(6);
    }
    
    public function isSideOne() :bool {
        return $this->equals(self::SideOne());
    }

    public function isSideTwo() :bool {
        return $this->equals(self::SideTwo());
    }

    public function isSideThree() :bool {
        return $this->equals(self::SideThree());
    }

    public function isSideFour() :bool {
        return $this->equals(self::SideFour());
    }

    public function isSideFive() :bool {
        return $this->equals(self::SideFive());
    }

    public function isSideSix() :bool {
        return $this->equals(self::SideSix());
    }

    public function value() :int {
        return $this->value;
    }

    public function equals(self $other) :bool {
        return $this->value === $other->value;
    }

    public static function sides() :array {
        return [
            SixSideDice::SideOne(),
            SixSideDice::SideTwo(),
            SixSideDice::SideThree(),
            SixSideDice::SideFour(),
            SixSideDice::SideFive(),
            SixSideDice::SideSix()
        ];
    }
}