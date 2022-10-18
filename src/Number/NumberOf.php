<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Numerable of.
 */
final class NumberOf implements Number
{
    use CastMixed;

    /**
     * @var float|int|Scalar $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param float|int|Scalar $num
     */
    final public function __construct($num)
    {
        $this->origin = $num;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber()
    {
        if ($this->origin instanceof Scalar) {
            $res = $this->origin->value();

            if (!is_float($res) && !is_integer($res)) {
                throw new Exception("Scalar object must be wrapper of Number");
            }

            return $res;
        }

        return $this->origin;
    }
}
