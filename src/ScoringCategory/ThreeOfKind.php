<?php
namespace Yatzy\ScoringCategory;

use Yatzy\DicesRoll;
use Yatzy\SixSideDice;
use Yatzy\ScoringCategory\IScoringCategory;

final class ThreeOfKind implements IScoringCategory {
    private const THREE_OCCURENCES_OF_A_KIND = 3;
    private $roll;

    public function __construct(DicesRoll $roll) {
        $this->roll = $roll;
    }

    public function score(): int {
        $dicesAtDecsendentOrder = [
            SixSideDice::SideSix(),
            SixSideDice::SideFive(),
            SixSideDice::SideFour(),
            SixSideDice::SideThree(),
            SixSideDice::SideTwo(),
            SixSideDice::SideOne(),
        ];
        foreach ($dicesAtDecsendentOrder as $dice) {
            $diceOcurrences = $this->roll->diceOcurrences($dice);
            if($diceOcurrences < self::THREE_OCCURENCES_OF_A_KIND) {
                continue;
            }
            return self::THREE_OCCURENCES_OF_A_KIND * $dice->value();
        }
        return 0;
    }
}