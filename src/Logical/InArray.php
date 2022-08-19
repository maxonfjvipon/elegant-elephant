<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOverloaded;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * In array of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class InArray implements Logical
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     * @return InArray
     */
    public static function new(array|Arrayable $arr, mixed $needle, bool $strict = false): InArray
    {
        return new self($arr, $needle, $strict);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     */
    public function __construct(
        private array|Arrayable $arr,
        private mixed $needle,
        private bool $strict = false
    ) {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return in_array($this->needle, $this->firstArrayableOverloaded($this->arr), $this->strict);
    }
}
