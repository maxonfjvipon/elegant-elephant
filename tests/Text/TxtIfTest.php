<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtIf;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textIfTrue(): void
    {
        $this->assertScalarThat(
            new TxtIf(true, "hello"),
            new IsEqual("hello")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfFalseWithNumerable(): void
    {
        $this->assertScalarThat(
            new TxtIf(false, "hello"),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfWithLogicalAndCallback(): void
    {
        $this->assertScalarThat(
            new TxtIf(
                new BooleanOf(true),
                fn () => new TextOf("hello")
            ),
            new IsEqual("hello")
        );
    }
}
