<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Mapped arrayable.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMapped implements Arrayable
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
     * @return ArrMapped
     */
    public static function ofArray(array $arr, callable $callback): ArrMapped
    {
        return ArrMapped::ofArrayable(
            ArrayableOf::array($arr),
            $callback
        );
    }

    /**
     * Ctor wrap.
     * @param Arrayable $arr
     * @param callable $callback
     * @return ArrMapped
     */
    public static function ofArrayable(Arrayable $arr, callable $callback): ArrMapped
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
