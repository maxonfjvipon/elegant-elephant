<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;


use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Tests\IsArr;
use Maxonfjvipon\ElegantElephant\Tests\IsLogic;
use Maxonfjvipon\ElegantElephant\Tests\IsNum;
use Maxonfjvipon\ElegantElephant\Tests\IsTxt;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsTrue;

final class OfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfNumber(): void
    {
        $this->assertAnyThat(
            AnyOf::num($num = 5.5),
            new IsEqual($num)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfNum(): void
    {
        $this->assertAnyThat(
            AnyOf::num($num = NumOf::number(5.5)),
            new IsNum($num)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfArray(): void
    {
        $this->assertAnyThat(
            AnyOf::arr($array = [1, 2, 3,]),
            new IsEqual($array)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfArr(): void
    {
        $this->assertAnyThat(
            AnyOf::arr($arr = ArrOf::array([1, 2, 3,])),
            new IsArr($arr)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfString(): void
    {
        $this->assertAnyThat(
            AnyOf::text($str = "Hello world"),
            new IsEqual($str)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfTxt(): void
    {
        $this->assertAnyThat(
            AnyOf::text($text = TxtOf::str("Hello world")),
            new IsTxt($text)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfBool(): void
    {
        $this->assertAnyThat(
            AnyOf::bool($bool = true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfLogic(): void
    {
        $this->assertAnyThat(
            AnyOf::bool($logic = LogicOf::bool(false)),
            new IsLogic($logic)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function anyOfFunc(): void
    {
        $this->assertAnyThat(
            AnyOf::func(fn () => "Hello there"),
            new IsEqual("Hello there")
        );
    }
}