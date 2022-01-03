<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use Exception;
use function substr;

final class SubOf implements Stringify
{
    /**
     * @var Stringify
     */
    private $str;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $length;

    public function __construct(Stringify $str, int $start, int $length = 0)
    {
        $this->str = $str;
        $this->start = $start;
        $this->length = $length;
    }


    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return
            false === (
                $sub =
                0 === $this->length ?
                    substr($this->str->asString(), $this->start) :
                    substr($this->str->asString(), $this->start, $this->length)
            ) ? '' : $sub
        ;
    }
}
