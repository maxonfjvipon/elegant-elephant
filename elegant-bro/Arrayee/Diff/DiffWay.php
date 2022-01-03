<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Diff;

use ElegantBro\Interfaces\Arrayee;
use Exception;

/**
 * @template T
 */
interface DiffWay
{
    /**
     * @param Arrayee $arrayee
     *
     * @return array<T>
     * @throws Exception
     */
    public function diff(Arrayee $arrayee): array;
}
