<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Stringable {@see Text}
 */
trait StringableText
{
    /**
     * @return string
     * @throws Exception
     */
    public function __toString()
    {
        return $this->value();
    }
}
