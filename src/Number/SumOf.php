<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Sum of items.
 */
final class SumOf extends NumEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param float|int|Number ...$items
     * @throws Exception
     */
    public function __construct(...$items)
    {
        parent::__construct(
            new ArraySum($this->mixedArrCast(...$items))
        );
    }
}
