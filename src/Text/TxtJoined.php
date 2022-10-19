<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined.
 */
final class TxtJoined extends TxtEnvelope
{
    /**
     * Ctor.
     *
     * @param array<string|Text>|Arrayable $items
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
