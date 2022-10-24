<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Sum of items.
 */
final class SumOf extends NumWrap
{
    use EnsureNum;
    use EnsureArr;

    /**
     * Sum of items.
     *
     * @param  float|int|Num ...$items
     * @return SumOf
     */
    final public static function items(...$items): SumOf
    {
        return new SumOf($items);
    }

    /**
     * Ctor.
     *
     * @param array<float|int|Num>|Arr $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            NumOf::func(
                fn () => array_sum(
                    array_map(
                        fn ($item) => $this->ensuredNum($item)->asNumber(),
                        $this->ensuredArr($arr)->asArray()
                    )
                )
            )
        );
    }
}
