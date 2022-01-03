<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Json;

use ElegantBro\Interfaces\Stringify;
use Exception;
use RuntimeException;
use function json_encode;
use function json_last_error;
use function json_last_error_msg;
use function preg_match;

final class JsonEncoded implements Stringify
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var int
     */
    private $options;

    /**
     * @var int
     */
    private $depth;

    public static function default($value): JsonEncoded
    {
        return new JsonEncoded($value, 0, 512);
    }

    public function __construct($value, int $options, int $depth)
    {
        $this->value = $value;
        $this->options = $options;
        $this->depth = $depth;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        $result = json_encode($this->value, $this->options, $this->depth);
        if (
            (false === $result || 1 !== preg_match('/\S/', $result)) &&
            JSON_ERROR_NONE !== json_last_error()
        ) {
            throw new RuntimeException(json_last_error_msg());
        }

        return $result;
    }
}
