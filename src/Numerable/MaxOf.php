<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Max of
 */
final class MaxOf implements Numerable
{
    use NumerableOverloaded;

    /**
     * @var float[]|int[]|Numerable[] $items
     */
    private array $items;

    /**
     * Ctor wrap.
     * @param float|int|Numerable ...$items
     * @return MaxOf
     */
    public static function new(float|int|Numerable ...$items)
    {
        return new self(...$items);
    }

    /**
     * Ctor.
     * @param float|int|Numerable ...$items
     */
    public function __construct(float|int|Numerable ...$items)
    {
        $this->items = $items;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return max(...$this->numerableOverloaded(...$this->items));
    }
}