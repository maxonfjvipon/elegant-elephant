<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Unique array.
 */
final class ArrUnique extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     */
    final public function __construct(array|Arr $arr)
    {
        parent::__construct(
            ArrOf::func(fn () => array_unique($this->ensuredArray($arr)))
        );
    }
}
