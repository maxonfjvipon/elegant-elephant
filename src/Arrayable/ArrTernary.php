<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\CastLogical;

/**
 * Ternary array.
 */
final class ArrTernary extends AbstractArrayable
{
    use CastLogical;
    use CastArrayable;

    /**
     * @var bool|Logical $condition
     */
    private $condition;

    /**
     * @var array<mixed>|callable|Arrayable $first
     */
    private $first;

    /**
     * @var array<mixed>|callable|Arrayable $alt
     */
    private $alt;

    /**
     * Ctor wrap.
     *
     * @param Logical|bool $condition
     * @param array<mixed>|callable|Arrayable $first
     * @param array<mixed>|callable|Arrayable $alt
     * @return self
     */
    public static function new($condition, $first, $alt): self
    {
        return new self($condition, $first, $alt);
    }

    /**
     * Ctor.
     *
     * @param Logical|bool $condition
     * @param array<mixed>|callable|Arrayable $first
     * @param array<mixed>|callable|Arrayable $alt
     */
    public function __construct($condition, $first, $alt)
    {
        $this->condition = $condition;
        $this->first = $first;
        $this->alt = $alt;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->logicalCast($this->condition)
            ? $this->arrayableOrCallableCast($this->first)
            : $this->arrayableOrCallableCast($this->alt);
    }
}
