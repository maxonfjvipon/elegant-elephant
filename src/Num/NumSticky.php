<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Num;

/**
 * Cached number.
 */
final class NumSticky extends NumWrap
{
    /**
     * @var array<int|float> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Num $num
     */
    final public function __construct(Num $num)
    {
        parent::__construct(
            NumOf::func(fn () => $this->cache[0] ??= $num->asNumber())
        );
    }
}
