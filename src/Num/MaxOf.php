<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

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
    final public function __construct(float|int|Num ...$items)
    {
        parent::__construct(
            NumOf::func(
                fn() => +max(array_map(
                    fn($item) => $this->ensuredNumber($item),
                    $items
                ))
            )
        );
    }
}
