<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtLoweredTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function loweredOfString(): void
    {
        Assert::assertThat(
            TxtLowered::new("Hello world!")->asString(),
            new IsEqual("hello world!")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function loweredOfText(): void
    {
        Assert::assertThat(
            TxtLowered::new(new TxtUpper(new TextOf("Hello world!")))->asString(),
            new IsEqual("hello world!")
        );
    }
}
