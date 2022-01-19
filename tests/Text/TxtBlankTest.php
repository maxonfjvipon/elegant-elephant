<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use PHPUnit\Framework\TestCase;

class TxtBlankTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "",
            TxtBlank::new()->asString()
        );
    }
}