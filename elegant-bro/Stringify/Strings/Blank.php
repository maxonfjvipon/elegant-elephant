<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;

final class Blank implements Stringify
{
    /**
     * @return string
     */
    public function asString(): string
    {
        return '';
    }
}
