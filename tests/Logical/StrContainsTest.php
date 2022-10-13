<?php

namespace Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\StrContains;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class StrContainsTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function containsInString(): void
    {
        $this->assertScalarThat(
            StrContains("hello world", 'hello')->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function containsTextInText(): void
    {
        $this->assertScalarThat(
            StrContains(new TextOf("foo-bar"), new TextOf("!!!"))->value(),
            new IsFalse()
        );
    }
}
