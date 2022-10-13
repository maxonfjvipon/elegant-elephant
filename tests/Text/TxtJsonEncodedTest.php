<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJsonEncoded;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtJsonEncodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function encodedOfString(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new TxtJsonEncoded(new TextOf("hello world")),
            new IsEqual('"hello world"')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfNumber(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new TxtJsonEncoded(new NumberOf(10.2)),
            new IsEqual('10.2')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfArray(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
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
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new TxtJsonEncoded(new BooleanOf(false)),
            new IsEqual('false')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfAny(): void
    {
        $this->assertScalarThat(
            new TxtJsonEncoded(new FirstOf([1, 2, 3])),
            new IsEqual('1')
        );
    }
}
