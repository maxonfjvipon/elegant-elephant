<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

final class TxtTernary implements Text
{
    use Overloadable;

    /**
     * @var bool|Logical $condition
     */
    private Logical|bool $condition;

    /**
     * @var Text|string $original
     */
    private Text|string $original;

    /**
     * @var Text|string $alt
     */
    private Text|string $alt;

    /**
     * @param Logical|bool $condition
     * @param string|Text $original
     * @param string|Text $alt
     * @return TxtTernary
     */
    public static function new(Logical|bool $condition, string|Text $original, string|Text $alt): TxtTernary
    {
        return new self($condition, $original, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $condition
     * @param string|Text $original
     * @param string|Text $alt
     */
    public function __construct(Logical|bool $condition, string|Text $original, string|Text $alt)
    {
        $this->condition = $condition;
        $this->original = $original;
        $this->alt = $alt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->overload([$this->condition], [[
            'boolean',
            Logical::class => fn(Logical $logical) => $logical->asBool()
        ]])[0]
            ? $this->overload([$this->original], [$this->rules()])[0]
            : $this->overload([$this->alt], [$this->rules()])[0];
    }

    /**
     * @return array
     */
    private function rules(): array
    {
        return [
            'string',
            Text::class => fn(Text $txt) => $txt->asString()
        ];
    }
}