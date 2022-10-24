<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
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
            new TxtUpper(new TxtOf(self::GIVEN)),
            new IsEqual(self::UPPER)
        );
    }
}
