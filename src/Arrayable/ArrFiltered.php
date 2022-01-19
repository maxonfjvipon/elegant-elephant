<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable filtered of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrFiltered implements Arrayable
{
    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $arrayable;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     * @param array $arr
     * @param callable $callback
     * @return ArrFiltered
     */
    public static function ofArray(array $arr, callable $callback): ArrFiltered
    {
        return ArrFiltered::ofArrayable(ArrayableOf::array($arr), $callback);
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arrayable
     * @param callable $callback
     * @return ArrFiltered
     */
    public static function ofArrayable(Arrayable $arrayable, callable $callback): ArrFiltered
    {
        return new self($arrayable, $callback);
    }

    /**
     * Ctor.
     * @param Arrayable $arrayable
     * @param callable $callback
     */
    private function __construct(Arrayable $arrayable, callable $callback)
    {
        $this->arrayable = $arrayable;
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_filter($this->arrayable->asArray(), $this->callback, ARRAY_FILTER_USE_BOTH);
    }
}