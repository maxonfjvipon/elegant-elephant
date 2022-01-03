<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class Replaced implements Stringify
{
    /**
     * @var Stringify
     */
    private $search;

    /**
     * @var Stringify
     */
    private $replace;

    /**
     * @var Stringify
     */
    private $subject;

    public function __construct(Stringify $search, Stringify $replace, Stringify $subject)
    {
        $this->search = $search;
        $this->replace = $replace;
        $this->subject = $subject;
    }


    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return str_replace(
            $this->search->asString(),
            $this->replace->asString(),
            $this->subject->asString()
        );
    }
}
