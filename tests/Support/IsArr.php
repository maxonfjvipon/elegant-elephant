<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use PHPUnit\Framework\Constraint\IsEqual;

final class IsArr extends ConstraintWrap
{
    /**
     * @param Arr $arr
     * @throws Exception
     */
    public function __construct(Arr $arr)
    {
        parent::__construct(
            new IsEqual($arr->asArray())
        );
    }
}