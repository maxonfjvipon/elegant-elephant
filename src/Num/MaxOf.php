<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Max.
 */
final class MaxOf extends NumWrap
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
                    $max = max(
                        array_map(
                            fn ($item) => $this->ensuredNum($item)->asNumber(),
                            $items
                        )
                    );

                    if (!is_numeric($max)) {
                        throw new Exception("Max can work with numbers only!");
                    }

                    return +$max;
                }
            )
        );
    }
}
