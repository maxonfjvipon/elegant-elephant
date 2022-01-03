<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Arrayee\Diff\DiffWay;
use ElegantBro\Interfaces\Arrayee;
use Exception;

/**
 * @template T
 */
final class DiffOf implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var DiffWay<T>
     */
    private $way;

    /**
     * @param Arrayee $arrayee
     * @param DiffWay<T> $way
     */
    public function __construct(Arrayee $arrayee, DiffWay $way)
    {
        $this->arrayee = $arrayee;
        $this->way = $way;
    }

    /**
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->way->diff($this->arrayee);
    }
}
