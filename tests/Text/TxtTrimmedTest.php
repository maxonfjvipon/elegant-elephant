<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTrimmed;
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
            new TxtTrimmed(new TextOf("\rHello there\t\n")),
            new IsEqual("Hello there")
        );
    }
}
