<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable sorted
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSorted implements Arrayable
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
     * @return ArrSorted
     * @throws Exception
     */
    public static function ofArray(array $array, ?callable $compare = null): ArrSorted
    {
        return ArrSorted::ofArrayable(ArrayableOf::array($array), $compare);
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @param callable|null $compare
     * @return ArrSorted
     */
    public static function ofArrayable(Arrayable $arrayable, ?callable $compare = null): ArrSorted
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
        if ($this->compare != null) {
            usort($arr, $this->compare);
        } else {
            sort($arr);
        }

        return $arr;
    }
}
