<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Cached logic.
 */
final class LogicSticky extends LogicWrap
{
    /**
     * @var array<bool> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Logic $origin
     */
    final public function __construct(Logic $origin)
    {
        parent::__construct(
            LogicOf::func(fn () => $this->cache[0] ??= $origin->asBool())
        );
    }
}
