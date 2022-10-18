<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Boolean of.
 */
final class BooleanOf implements Boolean
{
    /**
     * @var bool|Scalar $origin
     */
    private $origin;

    /**
     *
     * Ctor.
     *
     * @param bool|Scalar $bool
     */
    final public function __construct($bool)
    {
        $this->origin = $bool;
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        if ($this->origin instanceof Scalar) {
            if (!is_bool($res = $this->origin->value())) {
                throw new Exception("Scalar object must be wrapper of bool");
            }

            return $res;
        }

        return $this->origin;
    }
}
