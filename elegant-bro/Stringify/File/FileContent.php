<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\File;

use ElegantBro\Interfaces\Stringify;
use Exception;
use RuntimeException;
use Throwable;

final class FileContent implements Stringify
{
    /**
     * @var Stringify
     */
    private $filename;

    public function __construct(Stringify $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        try {
            if (false === $content = file_get_contents($this->filename->asString())) {
                throw new RuntimeException('Can not read file');
            }
        } catch (Throwable $t) {
            throw new RuntimeException($t->getMessage());
        }

        return $content;
    }
}
