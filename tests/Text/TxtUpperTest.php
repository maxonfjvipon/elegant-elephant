<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtUpperTest extends TestCase
{
    public const GIVEN = "foo";
    public const UPPER = "FOO";

    /**
     * @test
     * @throws Exception
     */
    public function upperOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtUpper(self::GIVEN),
            new IsEqual(self::UPPER)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function upperOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtUpper(new TextOf(self::GIVEN)),
            new IsEqual(self::UPPER)
        );
    }
}
