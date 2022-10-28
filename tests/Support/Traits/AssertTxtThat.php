<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support\Traits;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use PHPUnit\Framework\Constraint\Constraint;

trait AssertTxtThat
{

    /**
     * @param Txt $txt
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertTxtThat(Txt $txt, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($txt->asString(), $constraint, $message);
    }
}