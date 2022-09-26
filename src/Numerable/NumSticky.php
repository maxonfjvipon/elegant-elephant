<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Cached number.
 */
final class NumSticky implements Numerable
{
    /**
     * @var array<float|int> $cache
     */
    private array $cache = [];

    /**
     * @var Numerable $origin
     */
    private Numerable $origin;

    /**
     * Ctor wrap.
     *
     * @param Numerable $num
     * @return self
     */
    public static function new(Numerable $num): self
    {
        return new self($num);
    }

    /**
     * Ctor.
     *
     * @param Numerable $num
     */
    public function __construct(Numerable $num)
    {
        $this->origin = $num;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        return $this->cache[0] ??= $this->origin->asNumber();
    }
}
