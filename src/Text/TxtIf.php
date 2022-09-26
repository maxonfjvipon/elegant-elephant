<?php

declare(strict_types=1);

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
     *
     * @param bool|Logical $condition
     * @param string|callable|Text $text
     * @return self
     */
    public static function new($condition, $text): self
    {
        return new self($condition, $text);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical $condition
     * @param string|callable|Text $text
     */
    public function __construct($condition, $text)
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
