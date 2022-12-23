<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use PHPUnit\Framework\Constraint\IsEqual;

final class IsAny extends ConstraintWrap
{
    /**
     * @param Any $arr
     * @throws Exception
     */
    public function __construct(Any $arr)
    {
        parent::__construct(
            new IsEqual($arr->value())
        );
    }
}
