<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text joined.
 */
final class TxtJoined extends TxtWrap
{
    /**
     * Ctor.
     *
     * @param array<string|Txt>|Arr $items
     */
    final public function __construct($items)
    {
        parent::__construct(
            new TxtImploded(
                new TxtBlank(),
                $items
            )
        );
    }
}
