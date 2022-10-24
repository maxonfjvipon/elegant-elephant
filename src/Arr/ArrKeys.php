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
     * @param array|Arr $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            ArrOf::func(fn () => array_keys($this->ensuredArr($arr)->asArray()))
        );
    }
}
