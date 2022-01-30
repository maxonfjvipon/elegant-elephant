<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable merged of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMerged implements Arrayable
{
    /**
     * @var Arrayable[] $arrayables
     */
    private array $arrayables;

    /**
     * Ctor wrap.
     * @param array ...$arrays
     * @return ArrMerged
     * @throws Exception
     */
    public static function ofArrays(array ...$arrays): ArrMerged
    {
        return ArrMerged::ofArrayables(
            ...array_map(
                fn(array $arr) => ArrayableOf::array($arr),
                $arrays
            )
        );
    }

    /**
     * Ctor wrap.
     * @param Arrayable ...$arrayables
     * @return ArrMerged
     * @throws Exception
     */
    public static function ofArrayables(Arrayable ...$arrayables): ArrMerged
    {
        return new self(...$arrayables);
    }

    /**
     * Ctor.
     * @param Arrayable ...$arrayables
     */
    private function __construct(Arrayable ...$arrayables)
    {
        $this->arrayables = $arrayables;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_merge(
            ...ArrMapped::ofArray(
                $this->arrayables,
                fn(Arrayable $arrayable) => $arrayable->asArray()
            )
        );
    }
}
