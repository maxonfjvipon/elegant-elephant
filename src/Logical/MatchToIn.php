<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Match regex as.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
interface MatchToIn
{
    /**
     * @param Text $subject
     * @return Logical
     */
    public function inText(Text $subject): Logical;

    /**
     * @param string $subject
     * @return Logical
     */
    public function inString(string $subject): Logical;
}