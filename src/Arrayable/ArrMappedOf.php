<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Mapped arrayable.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
class ArrMappedOf implements Arrayable
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
     * @return ArrMappedOf
     */
    public static function array(array $arr, callable $callback): ArrMappedOf
    {
        return ArrMappedOf::arrayable(
            ArrayableOf::array($arr),
            $callback
        );
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arr
     * @param callable $callback
     * @return ArrMappedOf
     */
    public static function arrayable(Arrayable $arr, callable $callback): ArrMappedOf
    {
        return new self($arr, $callback);
    }

    /**
     * ArrMappedOf constructor.
     * @param Arrayable $arr
     * @param callable $callback
     */
    private function __construct(Arrayable $arr, callable $callback)
    {
        $this->arrayable = $arr;
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_map($this->callback, $this->arrayable->asArray());
    }
}
