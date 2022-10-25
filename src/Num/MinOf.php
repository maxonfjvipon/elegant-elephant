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
    final public function __construct(float|int|Num ...$items)
    {
        parent::__construct(
            NumOf::func(
                fn() => +min(array_map(
                    fn($item) => $this->ensuredNumber($item),
                    $items
                ))
            )
        );
    }
}
