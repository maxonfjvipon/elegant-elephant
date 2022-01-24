<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array keys.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrKeys implements Arrayable
{

    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $arrayable;

    /**
     * Ctor wrap.
     * @param array $array
     * @return ArrKeys
     */
    public static function ofArray(array $array): ArrKeys
    {
        return ArrKeys::ofArrayble(ArrayableOf::array($array));
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @return ArrKeys
     */
    public static function ofArrayble(Arrayable $arrayable): ArrKeys
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
        return array_keys($this->arrayable->asArray());
    }
}