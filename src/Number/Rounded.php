<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Rounded number.
 */
final class Rounded implements Number
{
    use CastScalar;

    /**
     * @var float|int|Number $origin
     */
    private $origin;

    /**
     * @var int $precision
     */
    private int $precision;

    /**
     * Ctor.
     *
     * @param float|int|Number $num
     * @param int $precision
     */
    public function __construct($num, int $precision = 0)
    {
        $this->origin = $num;
        $this->precision = $precision;
    }

    /**
     * @return float
     * @throws Exception
     */
    public function value(): float
    {
        return round($this->scalarCast($this->origin), $this->precision);
    }
}
