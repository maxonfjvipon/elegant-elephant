<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;

/**
 * Array cast.
 */
final class ArrCast extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @return self
     */
    public static function new($arr): self
    {
        return new self($arr);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     */
    public function __construct($arr)
    {
        parent::__construct(
            new ArrMapped(
                $arr,
                fn ($value) => $this->castMixed($value)
            )
        );
    }
}
