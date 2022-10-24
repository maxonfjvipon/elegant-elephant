<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\PregMatch;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class MatchRegexTest extends \Maxonfjvipon\ElegantElephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function simpleRegex(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new PregMatch("/^Hello$/", new TxtOf("Hello world")),
            new IsFalse()
        );
    }
}
