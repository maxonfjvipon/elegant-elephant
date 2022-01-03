<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Random;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Stringify;
use ElegantBro\Stringify\Cached;
use ElegantBro\Stringify\FromCallable;
use Exception;
use InvalidArgumentException;
use function count;
use function random_int;

final class Symbols implements Stringify
{
    /**
     * @var Stringify
     */
    private $value;

    public function __construct(Arrayee $alphabet, int $length)
    {
        $this->value = new Cached(
            new FromCallable(
                static function () use ($alphabet, $length) {
                    if ($length < 1) {
                        throw new InvalidArgumentException('Length must be more than 0');
                    }
                    $alphabetLen = count($codeAlphabet = $alphabet->asArray());
                    $token = '';
                    for ($i = 0; $i < $length; $i++) {
                        $token .= $codeAlphabet[random_int(0, $alphabetLen - 1)];
                    }

                    return $token;
                }
            )
        );
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        return $this->value->asString();
    }
}
