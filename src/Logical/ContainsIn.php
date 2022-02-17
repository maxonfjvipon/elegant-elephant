<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOverloaded;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * In array of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class ContainsIn implements Logical
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * @var mixed $needle
     */
    private mixed $needle;

    /**
     * @var bool $strict
     */
    private bool $strict;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     * @return ContainsIn
     */
    public static function new(array|Arrayable $arr, mixed $needle, bool $strict = false): ContainsIn
    {
        return new self($arr, $needle, $strict);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     */
    public function __construct(array|Arrayable $arr, mixed $needle, bool $strict = false)
    {
        $this->arr = $arr;
        $this->needle = $needle;
        $this->strict = $strict;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return in_array($this->needle, $this->firstArrayableOverloaded($this->arr), $this->strict);
    }
}
