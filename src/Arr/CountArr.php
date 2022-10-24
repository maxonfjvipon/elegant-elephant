<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Count {@see Arr}
 */
trait CountArr
{
    /**
     * @return int
     * @throws Exception
     */
    final public function count(): int
    {
        return count($this->asArray());
    }
}
