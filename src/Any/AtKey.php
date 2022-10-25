<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * At key.
 */
final class AtKey extends AnyWrap
{
    use EnsureAny;
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param string|int|float|Num|Txt $key
     * @param Arr|array<mixed> $arr
     */
    final public function __construct(
        string|int|float|Num|Txt $key,
        array|Arr $arr
    ) {
        parent::__construct(
            AnyOf::func(fn() => $this->ensuredArray($arr)[$this->ensuredAnyValue($key)])
        );
    }
}
