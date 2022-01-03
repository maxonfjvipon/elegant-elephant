<?php
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

declare(strict_types=1);

namespace ElegantBro\Stringify\Base64;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class Base64Encoded implements Stringify
{
    /**
     * @var Stringify
     */
    private $value;

    public function __construct(Stringify $value)
    {
        $this->value = $value;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        return base64_encode($this->value->asString());
    }
}
