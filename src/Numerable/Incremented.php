<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

final class Incremented implements Numerable
{
    /**
     * @var float|int|Numerable|string $origin
     */
    private float|int|string|Numerable $origin;

    /**
     * @param float|int|string|Numerable $origin
     * @return Incremented
     */
    public static function new(float|int|string|Numerable $origin): Incremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param float|int|string|Numerable $origin
     */
    public function __construct(float|int|string|Numerable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return Addition::new($this->origin, 1)->asNumber();
    }
}