<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTrimmed;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtTrimmedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfString(): void
    {
        $this->assertScalarThat(
            TxtTrimmed(" Hello world\r\t")->value(),
            new IsEqual("Hello world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfText(): void
    {
        $this->assertScalarThat(
            TxtTrimmed(new TextOf("\rHello there\t\n"))->value(),
            new IsEqual("Hello there")
        );
    }
}
