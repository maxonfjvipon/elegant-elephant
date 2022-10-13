<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * In array.
 */
final class InArray implements Boolean
{
    use CastScalar;

    /**
     * @var array<mixed>|Arrayable<mixed> $arr
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
     * @param array<mixed>|Arrayable<mixed> $arr
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
    public function value(): bool
    {
        return in_array($this->needle, (array) $this->scalarCast($this->arr), $this->strict);
    }
}