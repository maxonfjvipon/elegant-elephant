<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * In array.
 */
final class InArray implements Boolean
{
    use CastMixed;

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
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param mixed $needle
     * @param bool $strict
     */
    final public function __construct($arr, $needle, bool $strict = false)
    {
        $this->arr = $arr;
        $this->needle = $needle;
        $this->strict = $strict;
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return in_array($this->needle, (array) $this->mixedCast($this->arr), $this->strict);
    }
}
