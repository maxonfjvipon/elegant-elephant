<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrMerged;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtJsonEncoded;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtJsonEncodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function encodedOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded("hello world"),
            new IsEqual('"hello world"')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(new TxtOf("hello world")),
            new IsEqual('"hello world"')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfNumber(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(5),
            new IsEqual('5')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfNumerable(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(new NumOf(10.2)),
            new IsEqual('10.2')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfArray(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded([['x' => 1, 'y' => 2], ['x' => 3, 'y' => 4]]),
            new IsEqual('[{"x":1,"y":2},{"x":3,"y":4}]')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfArrayable(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(
                new ArrMerged(
                    new ArrObject(
                        "first",
                        [1, 2, 3]
                    ),
                    ['second' => 22],
                    [10, 20, 30]
                )
            ),
            new IsEqual('{"first":[1,2,3],"second":22,"0":10,"1":20,"2":30}')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfBool(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(true),
            new IsEqual('true')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfLogical(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(new LogicOf(false)),
            new IsEqual('false')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfAny(): void
    {
        $this->assertMixedCastThat(
            new TxtJsonEncoded(new FirstOf([1, 2, 3])),
            new IsEqual('1')
        );
    }
}
