<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text if.
 */
final class TxtIf extends TxtEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $condition
     * @param string|callable|Text $text
     */
    final public function __construct($condition, $text)
    {
        parent::__construct(
            new TxtTernary(
                $condition,
                $text,
                new TxtBlank()
            )
        );
    }
}
