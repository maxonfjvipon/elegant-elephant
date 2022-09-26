<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TextOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textOfStringTest(): void
    {
        Assert::assertThat(
            TextOf::new("foo")->asString(),
            new IsEqual("foo")
        );
    }
}
