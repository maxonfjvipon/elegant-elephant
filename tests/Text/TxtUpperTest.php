<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtUpperTest extends TestCase
{
    const GIVEN = "foo";
    const UPPER = "FOO";

    /**
     * @test
     * @throws Exception
     */
    public function upperOfString(): void
    {
        Assert::assertThat(
            TxtUpper::new(self::GIVEN)->asString(),
            new IsEqual(self::UPPER)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function upperOfText(): void
    {
        Assert::assertThat(
            TxtUpper::new(new TextOf(self::GIVEN))->asString(),
            new IsEqual(self::UPPER)
        );
    }
}
