<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\StrContains;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class StrContainsTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function containsInString(): void
    {
        $this->assertScalarThat(
            new StrContains("hello world", 'hello'),
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
            new StrContains(new TextOf("foo-bar"), new TextOf("!!!")),
            new IsFalse()
        );
    }
}
