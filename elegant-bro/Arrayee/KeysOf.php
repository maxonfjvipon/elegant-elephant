<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

use function array_keys;

final class KeysOf implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    public function __construct(Arrayee $arrayee)
    {
        $this->arrayee = $arrayee;
    }

    /**
     * @return array<int, (int|string)>
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_keys($this->arrayee->asArray());
    }
}
