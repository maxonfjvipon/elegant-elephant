<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSubstr;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtSubstrTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function substringOfString(): void
    {
        Assert::assertThat(
            TxtSubstr::new("Hello world", 6)->asString(),
            new IsEqual("world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function substringOfTextWithLength(): void
    {
        Assert::assertThat(
            TxtSubstr::new(new TextOf("Hello world"), 6, 2)->asString(),
            new IsEqual("wo")
        );
    }
}
