<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

/**
 * Blank text.
 */
final class TxtBlank extends TxtWrap
{
    /**
     * Ctor.
     */
    final public function __construct()
    {
        parent::__construct(TxtOf::str(""));
    }
}
