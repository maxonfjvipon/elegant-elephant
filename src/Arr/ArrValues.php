<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array values
 */
final class ArrValues extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            ArrOf::func(fn () => array_values($this->ensuredArr($arr)->asArray()))
        );
    }
}
