<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class MatchRegexTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
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
            new PregMatch("/^Hello$/", new TextOf("Hello world")),
            new IsFalse()
        );
    }
}
