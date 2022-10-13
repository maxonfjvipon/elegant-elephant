<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class LengthOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function lengthOfString(): void
    {
        $this->assertScalarThat(
            new LengthOf("foo"),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfText(): void
    {
        $this->assertScalarThat(
            new LengthOf(new TxtUpper(new TextOf("foo-bar"))),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArray(): void
    {
        $this->assertScalarThat(
            new LengthOf([1, 2, 3, 4]),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArrayable(): void
    {
        $this->assertScalarThat(
            new LengthOf(ArrayableOf::items(1, 2, 3, 4, 5)),
            new IsEqual(5)
        );
    }
}