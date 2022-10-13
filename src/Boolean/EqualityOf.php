<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Equality of.
 */
final class EqualityOf implements Boolean
{
    use CastScalar;

    /**
     * @var mixed $first
     */
    private $first;

    /**
     * @var mixed $second
     */
    private $second;

    /**
     * Ctor.
     *
     * @param mixed $arg1
     * @param mixed $arg2
     */
    public function __construct($arg1, $arg2)
    {
        $this->first = $arg1;
        $this->second = $arg2;
    }


    /**
     * @return bool
     * @throws Exception
     */
    public function value(): bool
    {
        return $this->scalarCast($this->first) === $this->scalarCast($this->second);
    }
}
