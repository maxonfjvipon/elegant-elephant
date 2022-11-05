<?php

namespace Maxonfjvipon\ElegantElephant\Tests;

use Maxonfjvipon\ElegantElephant\Tests\Support\Traits\AssertAnyThat;
use Maxonfjvipon\ElegantElephant\Tests\Support\Traits\AssertArrThat;
use Maxonfjvipon\ElegantElephant\Tests\Support\Traits\AssertLogicThat;
use Maxonfjvipon\ElegantElephant\Tests\Support\Traits\AssertNumThat;
use Maxonfjvipon\ElegantElephant\Tests\Support\Traits\AssertTxtThat;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use AssertAnyThat;
    use AssertArrThat;
    use AssertLogicThat;
    use AssertTxtThat;
    use AssertNumThat;
}
