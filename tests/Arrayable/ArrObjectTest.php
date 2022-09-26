<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\AtKey;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrObjectTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function asSingleArray(): void
    {
        Assert::assertThat(
            ArrObject::new('key', 'value')->asArray(),
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
        Assert::assertThat(
            ArrMerged::new(
                new ArrObject('key1', [1, 2]),
                new ArrObject('key2', "str"),
                new ArrObject('key3', new ArrayableOf(['foo', 'bar'])),
                new ArrObject('key4', new TextOf("Hello")),
                new ArrObject('key5', new FirstOf([1, 2])),
                new ArrObject('key6', new NumerableOf(5)),
                new ArrObject('key7', 8),
                new ArrObject('key8', new AtKey(['key1' => 1, 'key2' => 2], 'key1'))
            )->asArray(),
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
