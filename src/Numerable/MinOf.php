<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Min.
 */
final class MinOf implements Numerable
{
    use CastNumerable;

    /**
     * @var array<float|int|Numerable> $items
     */
    private array $items;

    /**
     * Ctor wrap.
     *
     * @param float|int|Numerable ...$items
     * @return self
     */
    public static function new(...$items): self
    {
        return new self(...$items);
    }

    /**
     * Ctor.
     *
     * @param float|int|Numerable ...$items
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
        $min = min(...$this->numerablesCast(...$this->items));

        if (!is_numeric($min)) {
            throw new Exception("Min can work with numbers only!");
        }

        return $min;
    }
}
