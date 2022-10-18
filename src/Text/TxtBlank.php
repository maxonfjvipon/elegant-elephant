<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Blank text.
 */
final class TxtBlank extends TxtEnvelope
{
    final public function __construct()
    {
        parent::__construct(new TextOf(""));
    }
}
