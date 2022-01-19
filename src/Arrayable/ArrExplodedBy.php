<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Arrayable exploded by.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
interface ArrExplodedBy
{
    /**
     * Of string
     * @param string $str
     * @return Arrayable
     */
    public function ofString(string $str): Arrayable;

    /**
     * Of text
     * @param Text $text
     * @return Arrayable
     */
    public function ofText(Text $text): Arrayable;
}