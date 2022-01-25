<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced to
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
interface TxtReplacedTo
{
    /**
     * @param string $subject
     * @return Text
     */
    public function inString(string $subject): Text;

    /**
     * @param Text $subject
     * @return Text
     */
    public function inText(Text $subject): Text;
}
