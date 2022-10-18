<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Equality of.
 */
final class EqualityOf implements Boolean
{
    use CastMixed;

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
    final public function __construct($arg1, $arg2)
    {
        $this->first = $arg1;
        $this->second = $arg2;
    }


    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return $this->mixedCast($this->first) === $this->mixedCast($this->second);
    }
}
