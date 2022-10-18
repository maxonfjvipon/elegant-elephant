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
    use CastMixed;

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
    final public function __construct($condition, $first, $second)
    {
        $this->condition = $condition;
        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value()
    {
        return $this->mixedCast($this->condition)
            ? $this->mixedOrCallableCast($this->first)
            : $this->mixedOrCallableCast($this->second);
    }
}
