<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class Formatted implements Stringify
{
    /**
     * @var Stringify
     */
    private $format;

    /**
     * @var array
     */
    private $args;

    public function __construct(Stringify $format, ...$args)
    {
        $this->format = $format;
        $this->args = $args;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return sprintf(
            $this->format->asString(),
            ...$this->args
        );
    }
}
