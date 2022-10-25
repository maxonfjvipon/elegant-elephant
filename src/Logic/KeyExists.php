<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Key exists.
 */
final class KeyExists extends LogicWrap
{
    use EnsureArr;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param int|string|Num|Txt $key
     * @param array<mixed>|Arr   $arr
     */
    final public function __construct(int|string|Num|Txt $key, array|Arr $arr)
    {
        parent::__construct(
            LogicOf::func(
                fn () => array_key_exists(
                    $this->ensuredAnyValue($key),
                    $this->ensuredArray($arr)
                )
            )
        );
    }
}
