<?php

namespace Mntz;

class GodClass
{
    /** @var array  */
    const ALLOWED_DOZENS = [6,7,8,9,10];

    /** @var int */
    private $dozensQuantity;

    /** @var array */
    private $result;

    /** @var int */
    private $totalGames;

    /** @var array */
    private $games;

    public function __construct(int $dozensQuantity, int $totalGames)
    {
        if (!in_array($dozensQuantity, self::ALLOWED_DOZENS)) {
            throw new \Exception('Dozen quantity not allowed!', 007);
        }

        $this->result = [];
        $this->dozensQuantity = $dozensQuantity;
        $this->totalGames = $totalGames;
    }

    public function setDozen(int $dozenQuantity): void
    {
        $this->dozensQuantity = $dozenQuantity;
    }

    public function getDozen(): int
    {
        return $this->dozensQuantity;
    }

    public function getAllGames(): array
    {
        for ($i = 0; $i < $this->totalGames; $i++) {
            $this->games[] = $this->startGame();
        }

        return $this->games;
    }

    public function startGame(): array
    {
        for ($i = 0; $i < 6; $i++) {
            do {
                $sortedNumber = array_rand($this->getRangeBetweenOneToSixty());
            } while (in_array($sortedNumber, $this->result));

            $this->result[$i] = $sortedNumber;
        }

        return $this->result;
    }

    public function viewTableOfGames(): string
    {
        $table = '<table>';
        foreach ($this->games as $game) {
            $table .= '<tr>';
            foreach ($game as $number) {
                $table .= "<td>$number</td>";
            }
            $table .= '</tr>';
        }

        $table .= '</table>';

        return $table;
    }

    private function getRangeBetweenOneToSixty(): array
    {
        $range = [];
        for ($i = 10; $i <= 60; $i++) {
            $range[$i] = number_format($i, $this->dozensQuantity);
        }

        return $range;
    }
}
