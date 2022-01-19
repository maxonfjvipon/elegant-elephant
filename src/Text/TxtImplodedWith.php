<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text imploded with
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
interface TxtImplodedWith
{
    /**
     * Of strings
     * @param string ...$strings
     * @return Text
     */
    public function ofStrings(string ...$strings): Text;

    /**
     * Of texts
     * @param Text ...$texts
     * @return Text
     */
    public function ofTexts(Text ...$texts): Text;


}