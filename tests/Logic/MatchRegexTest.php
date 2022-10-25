<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\PregMatch;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class MatchRegexTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function simpleRegex(): void
    {
        $this->assertLogicThat(
            new PregMatch("/Hello world/", "Hello world"),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function moreComplexRegexWithText(): void
    {
        $this->assertLogicThat(
            new PregMatch("/^Hello$/", TxtOf::str("Hello world")),
            new IsFalse()
        );
    }
}
