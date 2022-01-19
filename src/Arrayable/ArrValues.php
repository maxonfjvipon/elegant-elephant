<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable values
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
class ArrValues implements Arrayable
{
    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $arrayable;

    /**
     * Ctor wrap.
     * @param array $array
     * @return ArrValues
     */
    public static function ofArray(array $array): ArrValues
    {
        return ArrValues::ofArrayble(ArrayableOf::array($array));
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @return ArrValues
     */
    public static function ofArrayble(Arrayable $arrayable): ArrValues
    {
        return new self($arrayable);
    }

    /**
     * Ctor.
     * @param Arrayable $arrayable
     */
    private function __construct(Arrayable $arrayable)
    {
        $this->arrayable = $arrayable;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_values($this->arrayable->asArray());
    }
}