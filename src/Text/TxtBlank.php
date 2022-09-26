<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Blank text.
 */
final class TxtBlank implements Text
{
    /**
     * Ctor wrap.
     *
     * @return self
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @return string
     */
    public function asString(): string
    {
        return "";
    }
}
