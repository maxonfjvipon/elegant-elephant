<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;

/**
 * Cached number.
 */
final class NumSticky implements Number
{
    /**
     * @var array<float|int> $cache
     */
    private array $cache = [];

    /**
     * @var Number $origin
     */
    private Number $origin;

    /**
     * Ctor wrap.
     *
     * @param Number $num
     * @return self
     */
    public static function new(Number $num): self
    {
        return new self($num);
    }

    /**
     * Ctor.
     *
     * @param Number $num
     */
    public function __construct(Number $num)
    {
        $this->origin = $num;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function value()
    {
        return $this->cache[0] ??= $this->origin->value();
    }
}
