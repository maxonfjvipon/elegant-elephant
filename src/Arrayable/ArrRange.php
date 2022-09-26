<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\CastNumerable;

/**
 * Array range.
 */
final class ArrRange extends AbstractArrayable
{
    use CastNumerable;

    /**
     * @var int|float|Numerable $from
     */
    private $from;

    /**
     * @var int|float|Numerable $to
     */
    private $to;

    /**
     * @var int|float|Numerable $step
     */
    private $step;

    /**
     * Ctor wrap.
     *
     * @param int|float|Numerable $from
     * @param int|float|Numerable $to
     * @param int|float|Numerable $step
     * @return self
     */
    public static function new($from, $to, $step = 1): self
    {
        return new self($from, $to, $step);
    }

    /**
     * Ctor.
     *
     * @param int|float|Numerable $from
     * @param int|float|Numerable $to
     * @param int|float|Numerable $step
     */
    public function __construct($from, $to, $step = 1)
    {
        $this->from = $from;
        $this->to = $to;
        $this->step = $step;
    }

    /**
     * @return array<float|int>
     * @throws Exception
     */
    public function asArray(): array
    {
        return range(...$this->numerablesCast($this->from, $this->to, $this->step));
    }
}
