<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests\Strings;

use ElegantBro\Stringify\Strings\Blank;
use Exception;
use PHPUnit\Framework\TestCase;

class BlankTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals('', (new Blank())->asString());
    }
}
