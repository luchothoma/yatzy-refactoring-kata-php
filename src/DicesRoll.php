<?php
namespace Yatzy;

use Traversable;
use ArrayIterator;
use IteratorAggregate;
use Yatzy\SixSideDice;

final class DicesRoll implements IteratorAggregate {
    private $positionOne;
    private $positionTwo;
    private $positionThree;
    private $positionFour;
    private $positionFive;

    public function __construct(
        SixSideDice $positionOne,
        SixSideDice $positionTwo,
        SixSideDice $positionThree,
        SixSideDice $positionFour,
        SixSideDice $positionFive
    ) {
        $this->positionOne = $positionOne;
        $this->positionTwo = $positionTwo;
        $this->positionThree = $positionThree;
        $this->positionFour = $positionFour;
        $this->positionFive = $positionFive;
    }

    public static function FromSixSideDicesAsIntegerValues(
        int $dicePositionOneIntegerValue,
        int $dicePositionTwoIntegerValue,
        int $dicePositionThreeIntegerValue,
        int $dicePositionFourIntegerValue,
        int $dicePositionFiveIntegerValue
    ) :self {
        return new self(
            new SixSideDice($dicePositionOneIntegerValue),
            new SixSideDice($dicePositionTwoIntegerValue),
            new SixSideDice($dicePositionThreeIntegerValue),
            new SixSideDice($dicePositionFourIntegerValue),
            new SixSideDice($dicePositionFiveIntegerValue)
        );
    }

    public function positionOne() :SixSideDice {
        return $this->positionOne;
    }

    public function positionTwo() :SixSideDice {
        return $this->positionTwo;
    }

    public function positionThree() :SixSideDice {
        return $this->positionThree;
    }

    public function positionFour() :SixSideDice {
        return $this->positionFour;
    }

    public function positionFive() :SixSideDice {
        return $this->positionFive;
    }

    public function diceOcurrences(SixSideDice $diceToMatch) :int {
        return array_reduce(
            $this->toArray(),
            function(int $occurences, SixSideDice $actualDice) use ($diceToMatch) {
                $areEquals = $diceToMatch->equals($actualDice);
                return $occurences + ($areEquals? 1: 0);
            },
            0
        );
    }

    public function getIterator() :Traversable {
        return new ArrayIterator($this->toArray());
    }

    public function toArray() :array {
        return [
            1 => $this->positionOne,
            2 => $this->positionTwo,
            3 => $this->positionThree,
            4 => $this->positionFour,
            5 => $this->positionFive,
        ];
    }
}