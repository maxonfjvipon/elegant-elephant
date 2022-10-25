<?php

namespace Maxonfjvipon\ElegantElephant\Tests;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\IsEqual;

final class IsLogic extends ConstraintWrap
{
    /**
     * @param Logic $logic
     * @throws Exception
     */
    public function __construct(Logic $logic)
    {
        parent::__construct(
            new IsEqual($logic->asBool())
        );
    }
}