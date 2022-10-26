<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array keys.
 */
final class ArrKeys extends ArrWrap
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
            ArrOf::func(fn () => array_keys($this->ensuredArray($arr)))
        );
    }
}
