<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Ensure {@see Arr}
 */
trait EnsureArr
{
    /**
     * @param  array|Arr $arr
     * @return Arr
     */
    final private function ensuredArr($arr): Arr
    {
        if (!$arr instanceof Arr) {
            $arr = ArrOf::array($arr);
        }

        return $arr;
    }
}
