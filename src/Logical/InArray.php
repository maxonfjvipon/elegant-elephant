<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CastArrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * In array.
 */
final class InArray implements Logical
{
    use CastArrayable;

    /**
     * @var array<mixed>|Arrayable $arr
     */
    private $arr;

    /**
     * @var mixed $needle
     */
    private $needle;

    /**
     * @var bool $strict
     */
    private bool $strict;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     * @return self
     */
    public static function new($arr, $needle, bool $strict = false): self
    {
        return new self($arr, $needle, $strict);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     */
    public function __construct($arr, $needle, bool $strict = false)
    {
        $this->arr = $arr;
        $this->needle = $needle;
        $this->strict = $strict;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return in_array($this->needle, $this->arrayableCast($this->arr), $this->strict);
    }
}
