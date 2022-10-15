<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Cached array.
 */
final class ArrSticky extends ArrEnvelope
{
    /**
     * @var array<array> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Arrayable<mixed> $arr
     */
    public function __construct(Arrayable $arr)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => $this->cache[0] ??= $arr->asArray()
            )
        );
    }
}
