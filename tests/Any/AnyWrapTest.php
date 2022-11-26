<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyWrap;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class AnyWrapTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function wrapperWorks(): void
    {
        $this->assertAnyThat(
            new class () extends AnyWrap {
                public function __construct()
                {
                    parent::__construct(
                        new FirstOf([1, 2, 3])
                    );
                }
            },
            new IsEqual(1)
        );
    }
}
