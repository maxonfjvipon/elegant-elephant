<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Sum of items.
 */
final class SumOf extends NumEnvelope
{
    use CastNumerable;

    /**
     * Ctor wrap.
     *
     * @param float|int|Numerable ...$items
     * @return self
     * @throws Exception
     */
    public static function new(...$items): self
    {
        return new self(...$items);
    }

    /**
     * Ctor.
     *
     * @param float|int|Numerable ...$items
     * @throws Exception
     */
    public function __construct(...$items)
    {
        parent::__construct(
            new ArraySum($this->numerablesCast(...$items))
        );
    }
}
