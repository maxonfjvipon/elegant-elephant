<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Scalar\AtKey;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrObjectTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function asSingleArray(): void
    {
        $this->assertScalarThat(
            new ArrObject('key', 'value'),
            new IsEqual(['key' => 'value'])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function castWorks(): void
    {
        $this->assertScalarThat(
            new ArrMerged(
                new ArrObject('key1', [1, 2]),
                new ArrObject('key2', "str"),
                new ArrObject('key3', new ArrayableOf(['foo', 'bar'])),
                new ArrObject('key4', new TextOf("Hello")),
                new ArrObject('key5', new FirstOf([1, 2])),
                new ArrObject('key6', new NumberOf(5)),
                new ArrObject('key7', 8),
                new ArrObject('key8', new AtKey('key1', ['key1' => 1, 'key2' => 2]))
            ),
            new IsEqual([
                'key1' => [1, 2],
                'key2' => 'str',
                'key3' => ['foo', 'bar'],
                'key4' => "Hello",
                'key5' => 1,
                'key6' => 5,
                'key7' => 8,
                'key8' => 1
            ])
        );
    }
}
