<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use PHPUnit\Framework\Constraint\IsEqual;

final class IsTxt extends ConstraintWrap
{
    /**
     * @param Txt $txt
     * @throws Exception
     */
    public function __construct(Txt $txt)
    {
        parent::__construct(
            new IsEqual($txt->asString())
        );
    }
}
