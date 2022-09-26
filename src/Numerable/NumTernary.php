<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\CastLogical;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Num ternary.
 */
final class NumTernary implements Numerable
{
    use CastLogical;
    use CastNumerable;

    /**
     * @var bool|Logical $condition
     */
    private $condition;

    /**
     * @var float|int|callable|Numerable $first
     */
    private $first;

    /**
     * @var float|int|callable|Numerable $alt
     */
    private $alt;

    /**
     * Ctor wrap.
     *
     * @param bool|Logical $condition
     * @param float|int|callable|Numerable $first
     * @param float|int|callable|Numerable $alt
     * @return self
     */
    public static function new($condition, $first, $alt): self
    {
        return new self($condition, $first, $alt);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical $condition
     * @param float|int|callable|Numerable $first
     * @param float|int|callable|Numerable $alt
     */
    public function __construct($condition, $first, $alt)
    {
        $this->condition = $condition;
        $this->first = $first;
        $this->alt = $alt;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        return $this->logicalCast($this->condition)
            ? $this->numerableOrCallableCast($this->first)
            : $this->numerableOrCallableCast($this->alt);
    }
}
