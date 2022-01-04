<?php


namespace Maxonfjvipon\Elegant_Elephant\Arrayee\Exploded;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Stringify;

class Exploded implements Arrayee
{
    private Stringify $separator;

    private Stringify $stringify;

    public function __construct(Stringify $separator, Stringify $stringify)
    {
        $this->separator = $separator;
        $this->stringify = $stringify;
    }

    public function asArray(): array
    {
        return explode(
            $this->separator->asString(),
            $this->stringify->asString(),
        );
    }
}
