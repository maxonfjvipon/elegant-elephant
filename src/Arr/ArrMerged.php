<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Merged array.
 */
final class ArrMerged extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr ...$items
     */
    final public function __construct(array|Arr ...$items)
    {
        parent::__construct(
            ArrOf::func(
                fn () => array_merge(
                    ...array_map(
                        fn ($arr) => $this->ensuredArray($arr),
                        $items
                    )
                )
            )
        );
    }
}
