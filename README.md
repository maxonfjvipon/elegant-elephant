# ElegantElephant (In development)

ElegantElephant - small library of PHP primitives in EO style. Inspired by [Cactoos](https://github.com/yegor256/cactoos) from [@yegor256](https://github.com/yegor256).

[![EO principles respected here](https://www.elegantobjects.org/badge.svg)](https://www.elegantobjects.org)
[![DevOps By Rultor.com](http://www.rultor.com/b/maxonfjvipon/ElegantElephant)](http://www.rultor.com/p/maxonfjvipon/ElegantElephant)

[![Composer](https://github.com/maxonfjvipon/ElegantElephant/actions/workflows/php.yml/badge.svg)](https://github.com/maxonfjvipon/ElegantElephant/actions/workflows/php.yml)
[![codecov](https://codecov.io/github/maxonfjvipon/ElegantElephant/branch/master/graph/badge.svg?token=V0UL1FYGXW)](https://codecov.io/github/maxonfjvipon/ElegantElephant)
[![Hits-of-Code](https://hitsofcode.com/github/maxonfjvipon/ElegantElephant?branch=master)](https://hitsofcode.com/github/maxonfjvipon/ElegantElephant/view?branch=master)

[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://github.com/maxonfjvipon/ElegantElephant/blob/master/LICENSE)
[![Tag](https://img.shields.io/github/tag/maxonfjvipon/ElegantElephant.svg)](https://github.com/maxonfjvipon/ElegantElephant/releases)

## Principles
 | Priciple                                        | Yes/No             |
 | ----------------------------------------------- |--------------------|
 | No null                                         | :heavy_minus_sign: |
 | No code in constructors                         | :heavy_check_mark: |
 | No getters and setters                          | :heavy_check_mark: |
 | No mutable objects                              | :heavy_check_mark: |
 | No static methods, not even private ones        | :heavy_minus_sign: |
 | No instanceof, type casting, or reflection      | :heavy_minus_sign: |
 | No public methods without a contract            | :heavy_check_mark: |
 | No statements in test methods except assertThat | :heavy_check_mark: |

## Static methods
Since PHP does not allow you to have more than one constructor in the class, some classes in the library have public static methods that return an instance of the class and replace secondary constructors. Some classes have private primary constructor to prevent user to use them in a wrong way.

For example take a look at the class [`ArrOf`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Arr/ArrOf.php) that has private constructor but let you create an instance of [`Arr`](#arr) object in a several ways via static methods:

```php
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;

// From items
ArrOf::items($item1, $item2, $item3)->asArray(); // [$item1, $item2, $item3]

// From array
ArrOf::array([1, 2, 3])->asArray(); // [1, 2, 3]

// From Maxonfjvipon\ElegantElephant\Any
ArrOf::any(AnyOf::arr(["Hello", "Jeff"]))->asArray(); // ["Hello", "Jeff"]

// From callback
ArrOf::func(fn () => ["Hello", "World"])->asArray(); // ["Hello", "World"]
```

If you write code and see that you can't create an object via `new` keyword - definitely it's the class with private constructor but public static methods that replace constructors, so try them.

## Union arguments

Almost every classes allows you to pass union-typed arguments to the constructor.

For example, class [`TxtJoined`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Txt/TxtJoined.php) behaves like a joined string and accepts an `array` or an instance of `Arr` that both may contains strings, instances of `Txt` or both of them. 

```php
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;

$joined1 = new TxtJoined([
  TxtOf::str("Hello"), 
  " ", 
  TxtOf::any(AnyOf::str("Jeff"))
]);

$joined2 = new TxtJoined(
  ArrOf::func(fn () => [
    new TxtJoined(["Hello", " "]),
    "Jeff"
  ])
);

$joined1->asString() === $joined2->asString(); // "Hello Jeff" === "Hello Jeff" => TRUE
```

So when you write code you may not care about conversion an argument to the desired type, for example conversion `string` to `Maxonfjvipon\ElegantElephant\Txt`. Just pass what you have to the object, it knows how to deal with it.

## Arr
Elegant arrays. `Arr` interface has only one public method `asArray()` that must return an `array`.

### Spreading

There is one more interface that you can use in your own classes - [`IterableArr`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Arr/IterableArr.php) that extends `Arr` and [`\IteratorAggregate`](https://www.php.net/manual/en/class.iteratoraggregate.php). 

`\IteratorAggregate` allows you to apply spread operator `...` to your class. If you want to use spread operator with your class without actual calling `asArray()` method you should make your class implement `IterableArr` and use [`HasArrIterator`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Arr/HasArrIterator.php) trait. And now when you use `...` with your class trait calls `asArray()` behind the scene. 

And here is the example for better understanding:

```php
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\IterableArr;
use Maxonfjvipon\ElegantElephant\Arr\HasArrIterator;

class MyArr implements Arr { /** code */ }

class MyIterableArr implements IterableArr {
  use HasArrIterator;
  /** code */
}

$arr = [...(new MyArr())->asArray()]; // good
$arr = [...new MyIterableArr()]; // good
$arr = [...new MyArr()]; // wrong
```

All `Arr` classes in the library can be spead.

### Arr Objects

 | Class          | Description                                                             | PHP             |
 |----------------|-------------------------------------------------------------------------|-----------------|
 | ArrCast        | Cast all elements in given array                                        | -               |
 | ArrCombined    | Combine two arrays into signe one                                       | array_combine   |
 | ArrCond        | Behavies like first array if condition is TRUE, like second otherwise   | -               |
 | ArrEmpty       | Empty array                                                             | []              |
 | ArrExploded    | Elements of exploded by separator string                                | explode         |
 | ArrFiltered    | Filter elements of given array by given callback                        | array_filter    |
 | ArrFlatten     | Array flatten with given deep                                           | -               |
 | ArrIf          | Behaives like given array if condition is TRUE, like empty otherwise    | -               |
 | ArrKeys        | Get keys of given array                                                 | array_keys      |
 | ArrMapped      | Map elements of given array by given callback                           | array_map       |
 | ArrMerged      | Merge given arrays                                                      | array_merge     |
 | ArrObject      | Array with single key => value element                                  | [key => value]  |
 | ArrOf          | Allows to create Arr from array, Any or function                        | -               |
 | ArrRange       | Array of elements in given range                                        | range           |
 | ArrReversed    | Reverse given array                                                     | array_reverse   |
 | ArrSorted      | Sort array by given key or callback                                     | sort, usort     |
 | ArrSplit       | Alias or ArrExploded                                                    | explode, split  |
 | ArrSticky      | Array with cache mechanism                                              | -               |
 | ArrUnique      | Array with unique elements                                              | array_unique    |
 | ArrValues      | Array of just values of given array (ignore keys)                       | array_values    |
 | ArrWith        | Given array + new given element                                         | [...] + [$item] |
 | ArrWrap        | Envelope for Arr classes                                                | -               |
 | CountArr       | Default implementation of counting Arr if your Arr impelement Countable | count($array)   |
 | EnsureArr      | Help trait for casting array or Arr to array                            | -               |
 | HasArrIterator | Default implementation of spreading IterableArr                         | ...$array       |

### Tests

See [Arr unit test](https://github.com/maxonfjvipon/ElegantElephant/tree/master/tests/Arr) for better undestanding.


## Txt
Elegant strings

*TextOf* - just `string` decorator
```php
TextOf("foo")->asString(); // "foo"
(new TextOf(22))->asString(); // "22"
TextOf(1.2)->asString(); // "1.2"
```

*TxtUpper* - text in upper case:
```php
TxtUpper("bar")->asString(); // "BAR"
TxtUpper(TextOf("foo"))->asString(); // "FOO"
```

*TxtLowered* - text in lower case.
```php
TxtLowered("BAR")->asString(); // "bar"
TxtLowered(
  TxtUpper("foo")
)->asString(); // "foo"
```

*TxtImploded* - text imploded with separator:
```php
TxtImploded("-", "foo", "bar")->asString(); // "foo-bar"
TxtImploded("-", new TextOf("foo"), "bar")->asString(); // "foo-bar"
TxtImploded::withComma(TextOf::string("foo"), TxtUpper::ofString("bar"), "dash")->asString(); // "foo,BAR,dash"
```

*TxtJoined* - alias to `TxtImploded` without separator
```php
TxtJoined("foo", ",", TextOf("bar"))->asString(); // "foo,bar"
```

*TxtReplaced* - find string and replace it. 
```php
TxtReplcaed("foo", TxtUpper("bar"), "foobar")->asString(); // "BARbar"
```

And so on...

## Logical
Elegant boolean

*PregMatch* - match regex
```php
PregMatch("/foo/", TextOf::string("foobar"))->asBool(); // true
(new PregMatch(TxtLowered("FOO"), "foo-bar"))->asBool(); // true
```

*Conjunction* and *Disjunction* - logical AND and OR. (Php doesn't allow you to name classes with reserved words)
```php
Conjunction(
  Truth(),
  true,
  LogicalOf::bool(true),
  new KeyExists("foo", ["foo" => 1, "bar" => 2]),
  PregMatch("/foo/", "foobar")
)->asBool(); // true
```

*EqualityOf* - equality. You may check equality of texts, strings, ints, floats, booleans, arrays, arrayables, numerables.
```php
EqualityOf("foo", new TextOf("bar"))->asBool(); // false
EqualityOf(ArrayableOf::items(1, 2), [1, 2])->asBool(); // true
EqualityOf(2, new NumerableOf(TextOf("2")))->asBool(); // true
```

And so on...

## Numerable
Elegant numbers.

*LengthOf* - may decorates length of Text, string, array, arrayable:
```php
Equality(
  NumerableOf("5"),
  new LengthOf(new TextOf("Hello"))
)->asBool(); // true

LengthOf([1, 2])->asNumber(); // 2
```

*Addition, Subtraction, Decremented, Incremented, Multiplication* - basic arithmetic operations (needs more):
```php
Subtruction(5, Addition(1, Incremented(2)))->asNumber(); // 1
```

## Proc and Func (Experimental)
*Proc* incapsulates function that returns nothing, *Func* incapsulates function that returns something.

*Cycle* - Object Oriented ForEach (Does not work correctly for now)
```php
$num = 0;
Cycle::withCallable(
  static function($elem) use (&$num) {
    $num += $elem;
  }
)->exec([1, 2, 3, 4]); // $num is 10
```

## Contribution
There are so many classes you and me may create. So if you are interested, send a pull request. Don't forget to write tests and make sure they passed.
