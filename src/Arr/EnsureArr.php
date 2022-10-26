<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Ensure {@see Arr}
 */
trait EnsureArr
{
    /**
     * @param array<mixed>|Arr $arr
     * @return array<mixed>
     * @throws Exception
     */
    private function ensuredArray(array|Arr $arr): array
    {
        if (! is_array($arr)) {
            $arr = $arr->asArray();
        }

        return $arr;
    }
}
