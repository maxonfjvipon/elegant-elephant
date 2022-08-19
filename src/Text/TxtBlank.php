<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Blank text.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtBlank implements Text
{
    /**
     * Ctor wrap.
     * @return TxtBlank
     */
    public static function new(): TxtBlank
    {
        return new self();
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return "";
    }
}