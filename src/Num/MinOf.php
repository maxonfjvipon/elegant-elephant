<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Min.
 */
final class MinOf extends NumWrap
{
    use EnsureNum;

    /**
     * Ctor.
     *
     * @param float|int|Num ...$items
     */
    final public function __construct(...$items)
    {
        parent::__construct(
            NumOf::func(
                function () use ($items) {
                    $min = min(
                        array_map(
                            fn ($item) => $this->ensuredNum($item)->asNumber(),
                            $items
                        )
                    );

                    if (!is_numeric($min)) {
                        throw new Exception("Min can work with numbers only!");
                    }

                    return +$min;
                }
            )
        );
    }
}
