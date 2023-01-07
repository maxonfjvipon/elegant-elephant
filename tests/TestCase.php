<?php

namespace Maxonfjvipon\ElegantElephant\Tests;

use Maxonfjvipon\ElegantElephant\Support\Traits\AssertAnyThat;
use Maxonfjvipon\ElegantElephant\Support\Traits\AssertArrThat;
use Maxonfjvipon\ElegantElephant\Support\Traits\AssertLogicThat;
use Maxonfjvipon\ElegantElephant\Support\Traits\AssertNumThat;
use Maxonfjvipon\ElegantElephant\Support\Traits\AssertTxtThat;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use AssertAnyThat;
    use AssertArrThat;
    use AssertLogicThat;
    use AssertTxtThat;
    use AssertNumThat;
}
