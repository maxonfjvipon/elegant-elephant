<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable with cache.
 */
final class NumSticky implements Numerable
{
    /**
     * @var array $cache
     */
    private array $cache = [];

    /**
     * Ctor wrap.
     * @param Numerable $num
     * @return NumSticky
     */
    public static function new(Numerable $num): NumSticky
    {
        return new self($num);
    }

    /**
     * Ctor.
     * @param Numerable $num
     */
    public function __construct(private Numerable $num)
    {
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return $this->cache[0] ??= $this->num->asNumber();
    }
}