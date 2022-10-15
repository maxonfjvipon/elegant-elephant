<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
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
            new TxtLowered(new TxtUpper(new TextOf("Hello world!"))),
            new IsEqual("hello world!")
        );
    }
}
