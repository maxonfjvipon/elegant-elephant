<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Date;

use DateTimeInterface;
use ElegantBro\Interfaces\Stringify;
use Exception;

class FormattedDate implements Stringify
{
    /**
     * @var DateTimeInterface
     */
    private $date;

    /**
     * @var Stringify
     */
    private $format;

    public function __construct(DateTimeInterface $date, Stringify $format)
    {
        $this->date = $date;
        $this->format = $format;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->date->format(
            $this->format->asString()
        );
    }
}
