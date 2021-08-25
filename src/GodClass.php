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

    /** @var int */
    private $games;

    public function __construct(int $dozensQuantity, int $totalGames)
    {
        if (!in_array($dozensQuantity, self::ALLOWED_DOZENS)) {
            throw new \Exception('Dozen quantity not allowed!', 007);
        }

        $this->dozensQuantity = $dozensQuantity;
        $this->totalGames = $totalGames;
    }

    public function setDozen(int $dozen): void
    {
        $this->dozen = $dozen;
    }

    public function getDozen(): int
    {
        return $this->dozen;
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
        $game = [];

        for ($i = 0; $i < 6; $i++) {
            do {
                $sortedNumber = array_rand($this->getRangeBetweenOneToSixty());
            } while (in_array($sortedNumber, $game));

            $game[$i] = $sortedNumber;
        }

        return $game;
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

    private function dd($val)
    {
        var_dump($val);
        die();
    }
}