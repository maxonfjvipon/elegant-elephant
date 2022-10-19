<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * {@see Text} __toString
 */
trait TextToString
{
    /**
     * @return string
     * @throws Exception
     */
    public function __toString()
    {
        return $this->asString();
    }
}
