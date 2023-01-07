# ElegantElephant

ElegantElephant - small library of PHP primitives in EO style. Inspired by [Cactoos](https://github.com/yegor256/cactoos) from [@yegor256](https://github.com/yegor256).

[![EO principles respected here](https://www.elegantobjects.org/badge.svg)](https://www.elegantobjects.org)
[![DevOps By Rultor.com](http://www.rultor.com/b/maxonfjvipon/elegant-elephant)](http://www.rultor.com/p/maxonfjvipon/elegant-elephant)

[![Composer](https://github.com/maxonfjvipon/elegant-elephant/actions/workflows/composer.yml/badge.svg)](https://github.com/maxonfjvipon/elegant-elephant/actions/workflows/composer.yml)
[![codecov](https://codecov.io/github/maxonfjvipon/elegant-elephant/branch/master/graph/badge.svg?token=V0UL1FYGXW)](https://codecov.io/github/maxonfjvipon/elegant-elephant)
[![Hits-of-Code](https://hitsofcode.com/github/maxonfjvipon/elegant-elephant?branch=master)](https://hitsofcode.com/github/maxonfjvipon/elegant-elephant/view?branch=master)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://github.com/maxonfjvipon/elegant-elephant/blob/master/LICENSE)
[![Tag](https://img.shields.io/github/tag/maxonfjvipon/elegant-elephant.svg)](https://github.com/maxonfjvipon/elegant-elephant/releases)

## **Motivation**

PHP was designed and created like a procedural language. Then PHP started support OOP paradigm, but it's not really pure OOP. We got classes but we still use them in a procedural way. This library enforces you to write real objects in a real OOP.

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

## Getting started:

### Requirements

- PHP >= 8.0

### Installation

```
composer require maxonfjvipon/elegant-elephant
```

## Snippets

To get flatten array:

```php
// The result will be [0, 1, 2, 2, 3, 3, 4, 5]
(new ArrFlatten(
  [0, [1], [[2, 2], [3, 3]], [4, 5]],
  deep: 2
))->asArray();
```

To merge arrays:

```php

/* 
 * If user is admin, result array will contain permissions field
 *
 * [
 *    'name' => ...,
 *    'age' => ...,
 *    'permissions' => [...],
 *    'projects' => [
 *       ['name' => ..., 'created_at' => ...],
 *       [...],
 *       ...
 *    ]
 * ]
 */
(new ArrMerged(
  [
    'name' => $user->name,
    'age' => $user->age,
  ],
  new ArrIf(
    $user->isAdmin(),
    ArrOf::func(fn () => [
      'permissions' => [...]
    ])
  ),
  new ArrObject(
    'projects',
    new ArrMapped(
      $projects,
      fn (Project $project) => [
        'name' => $project->name,
        'created_at' => $project->created_at
      ]
    ) 
  )
))-asArray();
```

To manipulate with a text:

```php
// To lower case
(new TxtLowered(
  TxtOf::str("Hello")
))->asString();

// To upper case
(new TxtUpper("Hello"))->asString();

// Join texts, if $isAdmin === TRUE the result will be "Hello Admin" else "Hello username, what'up"
(new TxtJoined([
  "Hello ",
  // Conditional text, behaves like first text if condition is TRUE, like second otherwise
  new TxtCond(
    $isAdmin,
    "Admin"
    TxtOf::func(fn () => $user->name())
  ),
  // Conditional text, behaves like first text if condition is TRUE, like empty string otherwise
  new TxtIf(
    !$isAdmin,
    ", what's up"
  )
]))->asString();
```

To get first `x` from array of `x y` points:

```php
$points = [['x' => 1, 'y' => 1], ['x' => 2, 'y' => 2], [...], ...];

NumOf::any(
  new AtKey(
    'x',
    ArrOf::any(
      new FirstOf(
        $points
      )
    ) 
  )
)->asNumber(); // 1
```

To get length of filtered array:

```php
(new LengthOf(
  new ArrFiltered(
    [1, 2, 3, 4, 5, 6],
    fn (int $num) => $num > 3
  )
))->asNum(); // 3
```

Complicated example from commercial project with no visible algorithm:

```php
(new AtKey(                                                   // 12. Get element by key "pump" from given array
  'pump',
  ArrOf::any(                                                 // 11. Try to cast given element to array
    new FirstOf(                                              // 10. Get first element of given array
      new ArrCond(                                            // 9.1. If given sorted jockey pumps are not empty - take them
        new Not(
          new IsEmpty(
            $jockeyPumps = new ArrSticky(                     // 8. Cache given sorted jockey pumps
              new ArrSorted(                                  // 7. Sort given mapped jockey pumps by "cost" key
                new ArrMapped(                                // 6. Map given jockey pumps
                  new ArrCond(                                // 5.1. If optimized jockey pumps are not empty - take them
                    new Not(
                      new IsEmpty(
                        $optimized = new ArrSticky(           // 4. Cached optimized jockey pumps
                          new ArrFiltered(                    // 3. Filter cached jockey pumps with optimization
                            $dbPumps = new ArrSticky(         // 2. Cache jockey pumps
                              new ArrPumpsForJockeySelecting( // 1. Take jockey pumps from somewhere
                                $request->jockey_series_ids,
                                $request->accounting_rests
                              )
                            ),
                            $filterPump(threeFifths: true)
                          )
                        )
                      )
                    ),
                    $optimized,
                    new ArrFiltered(                           // 5.2. If opmtimized jockey pumps are empty - filter jockey pumps without optimization
                      $dbPumps,
                      $filterPump(threeFifths: false)
                    )
                  ),
                  fn (Pump $pump) => [
                    'pump' => $pump,
                    'cost' => $pump->priceByRates($rates),
                  ]
                ),
                'cost'
              )
            )
          )
        ),
        $jockeyPumps,
        [['pump' => null]]                                      // 9.2. or take [['pump' => null]] otherwise
      ),
    )
  ),
))->value();
```

## Static methods
Since PHP does not allow you to have more than one constructor in the class, some classes in the library have public static methods that return an instance of the class and replace secondary constructors. Some classes have private primary constructor to prevent user to use them in a wrong way.

For example take a look at the class [`ArrOf`](https://github.com/maxonfjvipon/elegant-elephant/blob/master/src/Arr/ArrOf.php) that has private constructor but let you create an instance of [`Arr`](#arr) object in a several ways via static methods:

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

For example, class [`TxtJoined`](https://github.com/maxonfjvipon/elegant-elephant/blob/master/src/Txt/TxtJoined.php) behaves like a joined string and accepts an `array` or an instance of `Arr` that both may contains strings, instances of `Txt` or both of them. 

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

## Any
Something that has value of any (mixed) type. `Any` interface has only one public method `value` that must return something of `mixed` type.

### Any objects

 | Class     | Description                                                                   |
|-----------|-------------------------------------------------------------------------------|
 | AnyFork   | Behaves like first value if condition is TRUE, like second otherwise          |
 | AnyCond   | Alias of AnyFork                                                              |
 | AnyOf     | Allow you to create Any from array, Arr, string, Txt, number, Num or function |
 | AnySticky | Any with caching mechanism                                                    |
 | AnyWrap   | Envelope for Any classes                                                      |
 | AtKey     | Get element from array or Arr by key                                          |
 | AtValue   | Get key from array or Arr by value                                            |
 | EnsureAny | Helper trait to cast mixed                                                    |
 | FirstOf   | Get the first element from array, Arr, string or Txt                          |
 | LastOf    | Get the last element from array, Arr, string or Txt                           |

### Tests

See [Any unit tests](https://github.com/maxonfjvipon/elegant-elephant/tree/master/tests/Any) for better undestanding.
 
## Arr
Elegant arrays. `Arr` interface has only one public method `asArray()` that must return an `array`.

### Spreading

There is one more interface that you can use in your own classes - [`IterableArr`](https://github.com/maxonfjvipon/elegant-elephant/blob/master/src/Arr/IterableArr.php) that extends `Arr` and [`\IteratorAggregate`](https://www.php.net/manual/en/class.iteratoraggregate.php). 

`\IteratorAggregate` allows you to apply spread operator `...` to your class. If you want to use spread operator with your class without actual calling `asArray()` method you should make your class implement `IterableArr` and use [`HasArrIterator`](https://github.com/maxonfjvipon/elegant-elephant/blob/master/src/Arr/HasArrIterator.php) trait. The trait is the default implementation of spreading `Arr` classes. And now when you use `...` with your class trait calls `asArray()` behind the scene. 

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

$arr = [...(new MyArr())->asArray()];         // good
$arr = [...new MyIterableArr()];              // good, no actual calling asArray()
$arr = [...(new MyIterableArr())->asArray()]; // good, but verbose
$arr = [...new MyArr()];                      // wrong
```

All `Arr` classes in the library can be spead.

### Arr classes

 | Class          | Description                                                             | PHP               |
|----------------|-------------------------------------------------------------------------|-------------------|
 | ArrCast        | Cast all elements in given array                                        | -                 |
 | ArrCombined    | Combine two arrays into signe one                                       | array_combine     |
 | ArrFork        | Behaves like first array if condition is TRUE, like second otherwise    | -                 |
 | ArrCond        | Alias Of ArrFork                                                        | -                 |
 | ArrEmpty       | Empty array                                                             | []                |
 | ArrExploded    | Elements of exploded by separator string                                | explode           |
 | ArrFiltered    | Filter elements of given array by given callback                        | array_filter      |
 | ArrFlatten     | Array flatten with given deep                                           | -                 |
 | ArrIf          | Behaves like given array if condition is TRUE, like empty otherwise     | -                 |
 | ArrKeys        | Get keys of given array                                                 | array_keys        |
 | ArrMapped      | Map elements of given array by given callback                           | array_map         |
 | ArrMerged      | Merge given arrays                                                      | array_merge       |
 | ArrObject      | Alias of ArrSingle                                                      | [key => value]    |
 | ArrOf          | Allows to create Arr from array, Any or function                        | -                 |
 | ArrPlucked     | Pluck an array of values from an array                                  | -                 |
 | ArrRange       | Array of elements in given range                                        | range             |
 | ArrReversed    | Reverse given array                                                     | array_reverse     |
 | ArrSingle      | Array with single key => value element                                  | [key => value]    |
 | ArrSorted      | Sort array by given key or callback                                     | sort, usort       |
 | ArrSplit       | Alias or ArrExploded                                                    | explode, split    |
 | ArrSticky      | Array with cache mechanism                                              | -                 |
 | ArrUnique      | Array with unique elements                                              | array_unique      |
 | ArrValues      | Array of just values of given array (ignore keys)                       | array_values      |
 | ArrWith        | Given array + new given element                                         | [...] + [$item]   |
 | ArrWithout     | Given array - element by key                                            | unset($arr[$key]) |
 | ArrWrap        | Envelope for Arr classes                                                | -                 |
 | CountArr       | Default implementation of counting Arr if your Arr impelement Countable | count($array)     |
 | EnsureArr      | Helper trait for casting array or Arr to array                          | -                 |
 | HasArrIterator | Default implementation of spreading IterableArr                         | ...$array         |

### Tests

See [Arr unit test](https://github.com/maxonfjvipon/ElegantElephant/tree/master/tests/Arr) for better undestanding.

## Logic
Elegant boolean. `Logic` interface has only one method `asBool()` that must return `bool`.

### Logic classes

 | Class          | Description                                                                      | PHP              |
|----------------|----------------------------------------------------------------------------------|------------------|
 | Conjunction    | Conjunction, logical AND                                                         | and, &&          |
 | Conj           | Alias of Conjunction                                                             | and, &&          |
 | ContainsIn     | Check if something contains in string, Txt, array or Arr                         | -                | 
 | Disjunction    | Disjunction, logical OR                                                          | or, \|\|         |
 | Disj           | Alias of Disjunction                                                             | or, \|\|         |
 | EnsureLogic    | Helper trait to cast bool or Logic to bool                                       | -                |
 | GreaterOrEqual | Check if first given number is greater than or equal to the second one           | \>=              |
 | GreaterThan    | Check if first given number is greater than the second one                       | \>               |
 | InArray        | Check if something contains in array or Arr                                      | in_array         |
 | InText         | Check if string or Txt contains in other string or Arr                           | strcontains      |
 | IsEmpty        | Check if string, Txt, array or Arr is empty                                      | empty()          |
 | IsEqual        | Check if one mixed element is equal to another                                   | ===              |
 | IsNotEmpty     | Chekc if string, Txt, array or Arr is not empty                                  | !empty()         |
 | IsNotEqual     | Check if one mixed element is not equal to another                               | !==              |
 | IsNull         | Check if given element is null                                                   | === null         |
 | IsNotNull      | Check if given element is not null                                               | !== null         |
 | KeyExists      | Check if key exists in array or Arr                                              | array_key_exists |
 | LessOrEqual    | Check if first given number is less than or equal to the second one              | \<=              |
 | LessThan       | Check if first given number is less than the second one                          | \<               |
 | LogicCond      | Alias of LogicFork                                                               | -                |
 | LogicFork      | Behaves like first given logic if given condition is TRUE, like second otherwise | -                |
 | LogicOf        | Allows you to create Logic from bool or function                                 | -                |
 | LogicSticky    | Logic with caching mechanism                                                     | -                |
 | LogicWrap      | Envelope for Logic classes                                                       | -                |
 | Not            | Logical Not                                                                      | !                |
 | PregMatch      | Check if string or Txt is match to regular expression                            | preg_match       |

### Tests

See [Logic unit tests](https://github.com/maxonfjvipon/elegant-elephant/tree/master/tests/Logic) for better undestanding.

## Num
Elegant numbers. `Num` interface has only one method `asNumber()` that must return `float` or `int`.

### Num classes

 | Class      | Description                                                           | PHP           |
|------------|-----------------------------------------------------------------------|---------------|
 | ArraySum   | Alias of SumOf                                                        | array_sum     |
 | Divided    | Division                                                              | a / b         |
 | EnsureNum  | Helper trait for casting number or Num to float or int                | -             |
 | LengthOf   | Length of string, Txt, array or Arr                                   | strlen, count |
 | MaxOf      | Max number                                                            | max           |
 | MinOf      | Min number                                                            | min           |
 | Multiplied | Multiplication                                                        | a * b         |
 | NumFork    | Behaves like first number if condition is TRUE, like second otherwise | -             |
 | NumCond    | Alias of NumFork                                                      | -             |
 | NumIf      | Behaves like given number if condition is TRUE, like 0 otherwise      | -             |
 | NumOf      | Allows to create Num from float, int, Any or function                 | -             |
 | NumSticky  | Num with caching mechanism                                            | -             |
 | NumWrap    | Envelope for Num classes                                              | -             |
 | Rounded    | Rounded number                                                        | round         |
 | SumOf      | Sum of given numbers or Nums                                          | array_sum     |

### Tests

See [Num unit tests](https://github.com/maxonfjvipon/elegant-elephant/tree/master/tests/Num) for better undestanding.

## Txt
Elegant strings. `Txt` interface has only one method `asString()` that must return `string`.

### Txt->__toString()
There is one more interface that you can use in your own classes - [`StringableTxt`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Txt/StringableTxt.php) that extends `Txt` and [`\Stringable`](https://www.php.net/manual/en/class.stringable.php). 

`\Stringable` allows you to cast your class to string via calling `__toString()` method. So instead of `Txt` you can use `StringableTxt` interface and [`TxtToString`](https://github.com/maxonfjvipon/ElegantElephant/blob/master/src/Txt/TxtToString.php) helper trait that calls `asString()` behind the scene. 

Here's an example for better undestanding:

```php
use Maxonfjvipon\ElegantElephant\Txt\StringableTxt;
use Maxonfjvipon\ElegantElephant\Txt\TxtToString;
use Maxonfjvipon\ElegantElephant\Txt;

class MyTxt implements Txt { /** code */ }

class MyStringableTxt implements StringableTxt {
  use TxtToString;
  /** code */
}

$txt = new MyTxt();
$stringableTxt = new MyStringableTxt();

echo $txt->asString();           // good
echo $stringableTxt;             // good, no actual calling asString()
echo $stringableTxt->asString(); // good, but verbose
echo $txt;                       // wrong
``` 

All `Txt` classes in the library implements `StringableTxt`.

### Txt classes

 | Class           | Description                                                            | PHP             |
|-----------------|------------------------------------------------------------------------|-----------------|
 | EnsureTxt       | Helper trait for casting string or Txt to string                       | -               |
 | TxtBlank        | Empty text.                                                            | ""              |
 | TxtFork         | Behaves like first text if condition is TRUE, like second otherwise    | -               |
 | TxtCond         | Alias of TxtFork                                                       | -               |
 | TxtIf           | Behaves like given text if condition is TRUE, likey empty otherwise    | -               |
 | TxtImploded     | Imploded text by separator                                             | implode         |
 | TxtJoined       | Joined text                                                            | join("", [...]) |
 | TxtJsonEncoded  | Object encoded to JSON as                                              | json_encoded    |
 | TxtLowered      | Text in a lower case                                                   | strtolower      |
 | TxtLtrimmed     | Text trimmed from left                                                 | ltrim           |
 | TxtOf           | Allows to create Txt from string, number, float, int, Any of function. | -               |
 | TxtPregReplaced | Text with replacements by regex                                        | preg_replace    |
 | TxtReplaced     | Text with replacements                                                 | str_replace     |
 | TxtRtimmed      | Text trimmed from right                                                | rtrim           |
 | TxtSticky       | Text with caching mechanism                                            | -               |
 | TxtSubstr       | Sub-text                                                               | substr          |
 | TxtToString     | Default implementation converting Txt to string via __toString()       | -               |
 | TxtTrimmed      | Text trimmed                                                           | trim            |
 | TxtUpper        | Text in a upper case                                                   | strtoupper      |
 | TxtWrap         | Envelope for Txt classes                                               | -               |

### Tests

See [Txt unit test](https://github.com/maxonfjvipon/ElegantElephant/tree/master/tests/Txt) for better undestanding.

## Contribution

Fork repository, make changes, send a pull request. To avoid frustration, before sending your pull request please run:

```bash
$ ./pre-push.sh
```

And make sure you have no errors.
