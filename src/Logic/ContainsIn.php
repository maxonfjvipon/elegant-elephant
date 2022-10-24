<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Contains in.
 */
final class ContainsIn extends LogicWrap
{
    /**
     * @param mixed                $needle
     * @param string|array|Txt|Arr $container
     */
    final public function __construct($needle, $container)
    {
        parent::__construct(
            new LogicCond(
                is_string($container) || $container instanceof Txt,
                new InText($needle, $container),
                new InArray($needle, $container)
            )
        );
    }
}
