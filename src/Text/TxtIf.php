<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text if.
 */
final class TxtIf extends TxtEnvelope
{

    /**
     * Ctor wrap.
     * @param bool|Logical $cond
     * @param string|callable|Text $text
     * @return TxtIf
     */
    public static function new(bool|Logical $cond, string|callable|Text $text): TxtIf
    {
        return new self($cond, $text);
    }

    /**
     * Ctor.
     * @param bool|Logical $cond
     * @param string|callable|Text $text
     */
    public function __construct(bool|Logical $cond, string|callable|Text $text)
    {
        parent::__construct(
            new TxtTernary(
                $cond,
                $text,
                new TxtBlank()
            )
        );
    }
}