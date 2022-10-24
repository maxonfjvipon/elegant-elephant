<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Cached array.
 */
final class ArrSticky extends ArrWrap
{
    /**
     * @var array<array> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Arr $arr
     */
    final public function __construct(Arr $arr)
    {
        parent::__construct(
            ArrOf::func(fn () => $this->cache[0] ??= $arr->asArray())
        );
    }
}
