<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Max.
 */
final class MaxOf implements Number
{
    use CastScalar;

    /**
     * @var array<float|int|Number> $items
     */
    private array $items;

    /**
     * Ctor.
     *
     * @param float|int|Number ...$items
     */
    public function __construct(...$items)
    {
        $this->items = $items;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function value()
    {
        $max = max(...$this->scalarsCast(...$this->items));

        if (!is_numeric($max)) {
            throw new Exception("Max can work with numbers only!");
        }

        return +$max;
    }
}
