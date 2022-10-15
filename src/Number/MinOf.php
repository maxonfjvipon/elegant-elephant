<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Min.
 */
final class MinOf implements Number
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
    public function __construct(...$items)
    {
        $this->items = $items;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        $min = min(...$this->mixedArrCast(...$this->items));

        if (!is_numeric($min)) {
            throw new Exception("Min can work with numbers only!");
        }

        return +$min;
    }
}
