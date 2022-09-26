<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class MatchRegexTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function simpleRegex(): void
    {
        Assert::assertThat(
            PregMatch::new("/Hello world/", "Hello world")->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function moreComplexRegexWithText(): void
    {
        Assert::assertThat(
            PregMatch::new("/^Hello$/", TextOf::new("Hello world"))->asBool(),
            new IsFalse()
        );
    }
}
