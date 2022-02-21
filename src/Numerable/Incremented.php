<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

final class Incremented implements Numerable
{
    /**
     * @var float|int|Numerable $origin
     */
    private float|int|Numerable $origin;

    /**
     * @param float|int|Numerable $origin
     * @return Incremented
     */
    public static function new(float|int|Numerable $origin): Incremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param float|int|Numerable $origin
     */
    public function __construct(float|int|Numerable $origin)
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
