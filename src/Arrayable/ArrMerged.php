<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable merged of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMerged implements Arrayable
{
    use ArrayableOverloaded, HasArrIterator;

    /**
     * @var Arrayable[] $arrayables
     */
    private array $arrs;

    /**
     * Ctor wrap.
     * @param array|Arrayable ...$arrs
     * @return ArrMerged
     */
    public static function new(array|Arrayable ...$arrs): ArrMerged
    {
        return new self(...$arrs);
    }

    /**
     * Ctor.
     * @param array|Arrayable ...$arrs
     */
    public function __construct(array|Arrayable ...$arrs)
    {
        $this->arrs = $arrs;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_merge(...$this->arrayableOverloaded(...$this->arrs));
    }
}
