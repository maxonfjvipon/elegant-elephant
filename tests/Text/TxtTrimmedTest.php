<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtTrimmed;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtTrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtTrimmed(" Hello world\r\t"),
            new IsEqual("Hello world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtTrimmed(new TxtOf("\rHello there\t\n")),
            new IsEqual("Hello there")
        );
    }
}
