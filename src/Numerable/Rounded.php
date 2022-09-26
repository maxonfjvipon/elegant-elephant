<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Rounded number.
 */
final class Rounded implements Numerable
{
    use CastNumerable;

    /**
     * @var float|int|Numerable $origin
     */
    private $origin;

    /**
     * @var int $precision
     */
    private int $precision;

    /**
     * Ctor wrap.
     *
     * @param float|int|Numerable $num
     * @param int $precision
     * @return self
     */
    public static function new($num, int $precision = 0): self
    {
        return new self($num, $precision);
    }

    /**
     * Ctor.
     *
     * @param float|int|Numerable $num
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
    public function asNumber(): float
    {
        return round($this->numerableCast($this->origin), $this->precision);
    }
}
