<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Filtered array.
 */
final class ArrFiltered extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     * @param callable         $callback
     */
    final public function __construct($arr, callable $callback)
    {
        parent::__construct(
            ArrOf::func(
                fn () => array_filter(
                    $this->ensuredArr($arr)->asArray(),
                    $callback,
                    ARRAY_FILTER_USE_BOTH
                )
            )
        );
    }
}
