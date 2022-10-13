<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Array range.
 */
final class ArrRange extends ArrEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param int|float|Number $from
     * @param int|float|Number $to
     * @param int|float|Number $step
     */
    public function __construct($from, $to, $step = 1)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => range(...$this->scalarsCast($from, $to, $step))
            )
        );
    }
}
