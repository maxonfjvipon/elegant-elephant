<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;
use Exception;
use LogicException;

/**
 * @param Stringify $stringify
 * @return string
 * @throws Exception
 */
function raw(Stringify $stringify): string
{
    return $stringify->asString();
}

/**
 * @param $scalar
 * @return Stringify
 */
function just($scalar): Stringify
{
    if (!is_scalar($scalar)) {
        throw new LogicException('Only scalar required');
    }

    return new Just((string)$scalar);
}
