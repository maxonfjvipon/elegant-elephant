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
     * @var array[] $arrays
     */
    private array $arrays;

    /**
     * Ctor wrap.
     * @param Arrayable ...$arrayables
     * @return ArrMerged
     * @throws Exception
     */
    public static function ofArrayables(Arrayable ...$arrayables): ArrMerged
    {
        return ArrMerged::ofArrays(
            ...array_map(
                fn(Arrayable $arrayable) => $arrayable->asArray(),
                $arrayables
            )
        );
    }

    /**
     * Ctor wrap.
     * @param array ...$arrays
     * @return ArrMerged
     * @throws Exception
     */
    public static function ofArrays(array ...$arrays): ArrMerged
    {
        return new self(...$arrays);
    }

    /**
     * Ctor.
     * @param array ...$arrays
     */
    private function __construct(array ...$arrays)
    {
        $this->arrays = $arrays;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_merge(...$this->arrays);
    }
}
