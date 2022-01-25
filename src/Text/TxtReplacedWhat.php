<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced what.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
interface TxtReplacedWhat
{
    /**
     * @param string $replace
     * @return TxtReplacedTo
     */
    public function toString(string $replace): TxtReplacedTo;

    /**
     * @param Text $replace
     * @return TxtReplacedTo
     */
    public function toText(Text $replace): TxtReplacedTo;
}