<?php

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar;

/**
 * Ternary scalar.
 */
final class SclTernary implements Scalar
{
    use CastScalar;

    /**
     * @var bool|Boolean $condition
     */
    private $condition;

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
     * @param bool|Boolean $condition
     * @param mixed $first
     * @param mixed $second
     */
    public function __construct($condition, $first, $second)
    {
        $this->condition = $condition;
        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function value()
    {
        return $this->scalarCast($this->condition)
            ? $this->scalarOrCallableCast($this->first)
            : $this->scalarOrCallableCast($this->second);
    }
}
