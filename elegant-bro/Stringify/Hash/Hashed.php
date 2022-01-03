<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Hash;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class Hashed implements Stringify
{
    /**
     * @var Stringify
     */
    private $message;

    /**
     * @var Stringify
     */
    private $algo;

    /**
     * @var bool
     */
    private $rawOutput;

    public function __construct(Stringify $message, Stringify $algo, bool $rawOutput = false)
    {
        $this->message = $message;
        $this->algo = $algo;
        $this->rawOutput = $rawOutput;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return hash(
            $this->algo->asString(),
            $this->message->asString(),
            $this->rawOutput
        );
    }
}
