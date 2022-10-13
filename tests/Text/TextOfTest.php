<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class TextOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textOfStringTest(): void
    {
        $this->assertScalarThat(
            new TextOf("foo"),
            new IsEqual("foo")
        );
    }
}
