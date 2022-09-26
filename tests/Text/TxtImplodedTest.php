<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;

final class TxtImplodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function implodedOfStrings(): void
    {
        Assert::assertThat(
            TxtImploded::new("-", "foo", "bar")->asString(),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedOfTexts(): void
    {
        Assert::assertThat(
            TxtImploded::new(new TextOf("/"), new TxtUpper("foo"), "bar")->asString(),
            new IsEqual("FOO/bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedWithComma(): void
    {
        Assert::assertThat(
            TxtImploded::withComma(new TxtUpper("foo"), "bar")->asString(),
            new IsEqual("FOO,bar")
        );
    }
}
