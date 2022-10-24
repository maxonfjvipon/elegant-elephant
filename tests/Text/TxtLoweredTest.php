<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtLowered;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtLoweredTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function loweredOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtLowered("Hello world!"),
            new IsEqual("hello world!")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function loweredOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtLowered(new TxtUpper(new TxtOf("Hello world!"))),
            new IsEqual("hello world!")
        );
    }
}
