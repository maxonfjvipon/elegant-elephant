<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Count {@see Arrayable}
 */
trait CountArrayable
{
    /**
     * @return int
     * @throws Exception
     */
    public function count(): int
    {
        return count($this->value());
    }
}
