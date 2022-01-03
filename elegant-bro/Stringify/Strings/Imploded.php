<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use ElegantBro\Stringify\Just;
use Exception;

final class Imploded implements Stringify
{
    /**
     * @var Stringify
     */
    private $glue;

    /**
     * @var array
     */
    private $pieces;

    public static function withComma(array $pieces): Imploded
    {
        return new Imploded(new Just(','), $pieces);
    }

    public function __construct(Stringify $glue, array $pieces)
    {
        $this->glue = $glue;
        $this->pieces = $pieces;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return implode($this->glue->asString(), $this->pieces);
    }
}
