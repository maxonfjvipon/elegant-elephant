<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJsonEncoded;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtJsonEncodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function encodedOfString(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new("hello world")->asString(),
            new IsEqual('"hello world"')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfText(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(new TextOf("hello world"))->asString(),
            new IsEqual('"hello world"')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfNumber(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(5)->asString(),
            new IsEqual('5')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfNumerable(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(new NumerableOf(10.2))->asString(),
            new IsEqual('10.2')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfArray(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new([['x' => 1, 'y' => 2], ['x' => 3, 'y' => 4]])->asString(),
            new IsEqual('[{"x":1,"y":2},{"x":3,"y":4}]')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfArrayable(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(
                new ArrMerged(
                    new ArrObject(
                        "first",
                        [1, 2, 3]
                    ),
                    ['second' => 22],
                    [10, 20, 30]
                )
            )->asString(),
            new IsEqual('{"first":[1,2,3],"second":22,"0":10,"1":20,"2":30}')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfBool(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(true)->asString(),
            new IsEqual('true')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfLogical(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(new Untruth())->asString(),
            new IsEqual('false')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function encodedOfAny(): void
    {
        Assert::assertThat(
            TxtJsonEncoded::new(new FirstOf([1, 2, 3]))->asString(),
            new IsEqual('1')
        );
    }
}
