<?php

namespace Maxonfjvipon\ElegantElephant\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * {@see Txt} __toString
 */
trait TxtToString
{
    /**
     * @return string
     * @throws Exception
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
