<?php
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

declare(strict_types=1);

namespace ElegantBro\Stringify\Base64;

use ElegantBro\Interfaces\Stringify;
use Exception;
use InvalidArgumentException;

final class Base64Decoded implements Stringify
{
    /**
     * @var Stringify
     */
    private $value;

    public function __construct(Stringify $value)
    {
        $this->value = $value;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        if (false === $res = base64_decode($this->value->asString(), true)) {
            throw new InvalidArgumentException('The input contains character from outside the base64 alphabet');
        }

        return $res;
    }
}
