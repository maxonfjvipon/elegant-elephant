<?php

namespace Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\StrContains;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class StrContainsTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function containsInString(): void
    {
        Assert::assertThat(
            StrContains::new("hello world", 'hello')->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function containsTextInText(): void
    {
        Assert::assertThat(
            StrContains::new(new TextOf("foo-bar"), new TextOf("!!!"))->asBool(),
            new IsFalse()
        );
    }
}
