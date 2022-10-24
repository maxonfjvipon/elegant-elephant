<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtSubstr;
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
            new TxtSubstr(new TxtOf("Hello world"), 6, 2),
            new IsEqual("wo")
        );
    }
}
