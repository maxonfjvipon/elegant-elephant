<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

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
        $this->assertTxtThat(
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
        $this->assertTxtThat(
            new TxtSubstr(TxtOf::str("Hello world"), 6, 2),
            new IsEqual("wo")
        );
    }
}
