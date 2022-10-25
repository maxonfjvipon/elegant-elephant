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
     * @param mixed $needle
     * @param string|array|Txt|Arr $container
     */
    final public function __construct(mixed $needle, string|array|Txt|Arr $container)
    {
        parent::__construct(
            is_string($container) || $container instanceof Txt
                ? new InText($needle, $container)
                : new InArray($needle, $container)
        );
    }
}
