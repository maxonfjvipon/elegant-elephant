<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable with caching
 */
final class ArrSticky implements Arrayable
{
    use HasArrIterator;

    /**
     * @var Arrayable $arr
     */
    private Arrayable $arr;

    /**
     * @var array $cache
     */
    private array $cache = [];

    /**
     * Ctor wrap.
     * @param Arrayable $arr
     * @return ArrSticky
     */
    public static function new(Arrayable $arr)
    {
        return new  self($arr);
    }

    /**
     * Ctor.
     * @param Arrayable $arrayable
     */
    public function __construct(Arrayable $arrayable)
    {
        $this->arr = $arrayable;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->cache[0] ?? ($this->cache[0] = $this->arr->asArray());
    }
}