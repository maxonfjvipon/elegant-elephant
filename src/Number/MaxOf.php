<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Max.
 */
final class MaxOf implements Number
{
    use CastMixed;

    /**
     * @var array<float|int|Number> $items
     */
    private array $items;

    /**
     * Ctor.
     *
     * @param float|int|Number ...$items
     */
    final public function __construct(...$items)
    {
        $this->items = $items;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber()
    {
        $max = max(...$this->mixedArrCast(...$this->items));

        if (!is_numeric($max)) {
            throw new Exception("Max can work with numbers only!");
        }

        return +$max;
    }
}
