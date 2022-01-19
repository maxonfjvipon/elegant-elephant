<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable sorted by keys.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
class ArrSortedByKeys implements Arrayable
{
    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $arrayable;

    /**
     * @var callable $compare
     */
    private $compare;

    /**
     * Ctor wrap.
     * @param array $array
     * @param callable|null $compare
     * @return ArrSortedByKeys
     */
    public static function ofArray(array $array, ?callable $compare = null): ArrSortedByKeys
    {
        return ArrSortedByKeys::ofArrayable(ArrayableOf::array($array), $compare);
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @param callable|null $compare
     * @return ArrSortedByKeys
     */
    public static function ofArrayable(Arrayable $arrayable, ?callable $compare = null): ArrSortedByKeys
    {
        return new self($arrayable, $compare);
    }

    /**
     * Ctor.
     * @param Arrayable $arrayable
     * @param callable|null $compare
     */
    private function __construct(Arrayable $arrayable, ?callable $compare = null)
    {
        $this->arrayable = $arrayable;
        $this->compare = $compare;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        $arr = $this->arrayable->asArray();
        uksort($arr, $this->compare ?? fn($a, $b) => $a === $b ? 0 : ($a > $b ? 1 : -1));

        return $arr;
    }
}