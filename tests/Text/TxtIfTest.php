<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtIf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textIfTrue(): void
    {
        Assert::assertThat(
            TxtIf::new(true, "hello")->asString(),
            new IsEqual("hello")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfFalseWithNumerable(): void
    {
        Assert::assertThat(
            TxtIf::new(false, "hello")->asString(),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfWithLogicalAndCallback(): void
    {
        Assert::assertThat(
            TxtIf::new(
                new Truth(),
                fn () => new TextOf("hello")
            )->asString(),
            new IsEqual("hello")
        );
    }
}
