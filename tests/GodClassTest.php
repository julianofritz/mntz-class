<?php

use Mntz\GodClass;
use PHPUnit\Framework\TestCase;

class GodClassTest extends TestCase
{
    /** @var GodClass */
    private $godClass;

    public function setUp(): void
    {
        $this->godClass = new GodClass(6,2);
    }

    public function testLoadClass()
    {
        $this->assertInstanceOf(GodClass::class, $this->godClass);
    }

    public function testShouldNotAcceptNotAllowedDozens()
    {
        $this->expectExceptionMessage('Dozen quantity not allowed!');
        $this->expectExceptionCode(007);

        new GodClass(1,1);
    }

    public function testShoulReturnTwoGames()
    {
        $games = $this->godClass->getAllGames();

        $this->assertEquals(2, count($games));
    }

    public function testEachGameShouldHasSixNumbers()
    {
        $games = $this->godClass->getAllGames();

        foreach ($games as $game) {
            $this->assertEquals(6, count($game));
        }
    }

}