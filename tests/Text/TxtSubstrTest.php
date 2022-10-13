<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSubstr;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtSubstrTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function substringOfString(): void
    {
        $this->assertScalarThat(
            TxtSubstr("Hello world", 6)->value(),
            new IsEqual("world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function substringOfTextWithLength(): void
    {
        $this->assertScalarThat(
            TxtSubstr(new TextOf("Hello world"), 6, 2)->value(),
            new IsEqual("wo")
        );
    }
}
