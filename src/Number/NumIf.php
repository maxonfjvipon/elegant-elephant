<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;

/**
 * Numerable if.
 */
final class NumIf extends NumEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $condition
     * @param float|int|callable|Number $num
     */
    final public function __construct($condition, $num)
    {
        parent::__construct(
            new NumTernary(
                $condition,
                $num,
                0
            )
        );
    }
}
