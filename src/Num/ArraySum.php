<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Alias of {@see SumOf}
 */
final class ArraySum extends NumWrap
{
    /**
     * @param array<float|int|Num>|Arr $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            new SumOf($arr)
        );
    }
}
