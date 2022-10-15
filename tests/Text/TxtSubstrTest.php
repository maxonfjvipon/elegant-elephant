<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSubstr;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtSubstrTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function substringOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtSubstr("Hello world", 6),
            new IsEqual("world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function substringOfTextWithLength(): void
    {
        $this->assertMixedCastThat(
            new TxtSubstr(new TextOf("Hello world"), 6, 2),
            new IsEqual("wo")
        );
    }
}
