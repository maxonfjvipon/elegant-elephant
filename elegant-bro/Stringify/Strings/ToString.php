<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class ToString
{
    /**
     * @var Stringify
     */
    private $stringify;

    public function __construct(Stringify $stringify)
    {
        $this->stringify = $stringify;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function __toString()
    {
        return $this->stringify->asString();
    }
}
