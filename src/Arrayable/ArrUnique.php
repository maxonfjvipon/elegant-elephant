<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable unique.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrUnique implements Arrayable
{
    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $arrayable;

    /**
     * Ctor wrap.
     * @param array $array
     * @return ArrUnique
     */
    public static function ofArray(array $array): ArrUnique
    {
        return ArrUnique::ofArrayble(ArrayableOf::array($array));
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @return ArrUnique
     */
    public static function ofArrayble(Arrayable $arrayable): ArrUnique
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
        return array_unique($this->arrayable->asArray());
    }
}