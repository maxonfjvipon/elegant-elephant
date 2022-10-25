<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

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
        $this->assertTxtThat(
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
        $this->assertTxtThat(
            new TxtLowered(new TxtUpper(TxtOf::str("Hello world!"))),
            new IsEqual("hello world!")
        );
    }
}
