<?php

namespace Maxonfjvipon\Elegant_Elephant\Numeric;

use ElegantBro\Interfaces\Numeric;
use ElegantBro\Interfaces\Stringify;
use Exception;

class LengthOfStingify implements Numeric
{
    /**
     * @var Stringify $stringify
     */
    private Stringify $stringify;

    /**
     * Ctor.
     * @param Stringify $strfg
     */
    public function __construct(Stringify $strfg)
    {
        $this->stringify = $strfg;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asNumber(): string
    {
        return (string)strlen($this->stringify->asString());
    }
}