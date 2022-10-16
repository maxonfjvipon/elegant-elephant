# ElegantElephant (In development)

ElegantElephant - trying to write php code in elegant way. Inspired by [Cactoos](https://github.com/yegor256/cactoos) from [@yegor256](https://github.com/yegor256).

[![EO principles respected here](https://www.elegantobjects.org/badge.svg)](https://www.elegantobjects.org)

## Principles
 | Priciple| Yes/No|
 | ------------- |:------------------:|
 | No null       | :heavy_check_mark:    |
 | No code in constructors     | :heavy_check_mark: |
 | No getters and setters     | :heavy_check_mark: |
 | No mutable objects | :heavy_check_mark:         |
 | No static methods, not even private ones | :heavy_minus_sign:         |
 | No instanceof, type casting, or reflection | :heavy_minus_sign:         |
 | No public methods without a contract | :heavy_check_mark:         |
 | No statements in test methods except assertThat | :heavy_check_mark:  |

## Static methods
Every class has at least one `public static` method (mostly it's `new` method). Motivation: getting rid of extra brackets `(` and `)` around the `new Class` if we want to call method just after object creating. 

For example, if we call a method after creating an object in a regular way:
```php
(new LengthOf("foo"))->asNumber(); // extra brackets
```

Example from the library (no extra brackets, looks prettier in my opinion):
```php
LengthOf("foo")->asNumber();
```
Constuctors are public, so if you want, you can use them instead of this static `new`

## Arrayable
Elegant arrays. Every Arrayable classes implements `Arrayable` interface that has one public method `asArray()` that should return `array`.  

### Spreading
Every `Arrayable` class can be spread. If you want your custom `Arrayable` class to be able to spread it should extend `ArrayableIterable` or use `HarArrIterator` trait. And here is the example for better understanding:

```php
// regular php
$arr = array_merge(
  ...array_map(
    fn($num) => array_map(
      fn($letter) => "$num $letter",
      ["a", "b"]
    ),
    [1, 2]
  )
);
echo $arr; // ["1 a", "1 b", "2 a", "2 b"]

// the same result can be got with Arrayable
$arr = ArrMerged(
  ...new ArrMapped(
    [1, 2],
    fn($num) => new ArrMapped(
      ["a", "b"],
      fn($letter) => "$num $letter"
    )
  )
)->asArray();
```

### Arguments overloading
The library support [arguments overloading](https://github.com/maxonfjvipon/overloaded-elephant). This means that almost every classes in the library can accept arguments of multiple types. For example, almost every `Arrayable` class can accept `Arrayable|array` as argument. It allows you to no call `asArray()` on argument you pass to object. Here what you can do:

```php
// ArrMerged merges given arrays
ArrMerged(
  [1, 2],
  new ArrFiltered(
    [3, 10],
    fn($num) => $num > 5
  ),
  ["Hello", "World"],
  new ArrIf(
    false,
    [20, 21]
  )
)->asArray();  // [1, 2, 10, "Hello", "World"]
```

#### *ArrayableOf*
Just decorator for `array`. No need to use because of overloading, but no need to get rid of it for now
```php
ArrayableOf::array([1, 2])->asArray(); // [1, 2]
ArrayableOf::items(1, 2)->asArray(); // [1, 2]
(new ArrayableOf([1, 2]))->asArray(); // [1, 2]
```

#### *ArrExploded*
Arrayable exploded by separator. Separator and string to explode can be `string` or [`Text`](#text)
```php
ArrExploded("-", "foo-bar")->asArray(); // ["foo", "bar"]
(new ArrExploded(TextOf("-"), "foo-bar"))->asArray(); // ["foo", "bar"]
ArrExploded::byComma(new TextOf("foo,bar"))->asArray(); // ["foo", "bar"]
```

#### *ArrFiltered* 
Arrayable filtered by given callback.
```php
ArrFiltered([1, 2], fn($num) => $num > 1)->asArray(); // [2]
(new ArrFiltered(new ArrExploded("-", "foo-bar-baz"), fn($string) => $string !== "foo"))->asArray(); // ["bar", "baz"]
```

#### *ArrIf*
Conditionable arrayable. Returns given array if condition is `true` or `[]` otherwise. Condition can be `bool` or [`Logical`](#logical)  When to use: for example you want to merge some arrays and one of them is not empty only if some condition is `true`. In regular php you can do it like this:
```php
$arr = array_merge(
  [...],
  [...],
  $condition 
    ? [...] // not empty
    : [] // empty
  ...
)
```
Or you can use `ArrIf`:
```php
$arr = ArrMerged(
  [...],
  [...],
  new ArrIf(
    $condition,
    [...] // not empty
  ),
  ...
)->asArray();
```

Since this is a declarative way to use conditional arrays your array will be created before the condition is checked. It's kind of performance and logical issue if you're dealing with arrays from database:

```php
ArrIf(
  false,
  $database->query(...)->get() // this query will be executed before object checks that condition is false 
)->asArray();
```

To avoid issues like this you can use `ArrFromCallback` (see below) or callback as second argument. In that case object checks the condition and then call your callback.

```php
ArrIf(
  false,
  new ArrFromCallback(
    fn() => $database->query(...)->get() // will not be executed before the condition is checked
  )
)->asArray();
// or
ArrIf(
  false,
  fn() => $database->query(...)->get() // will not be executed before the condition is checked too
)->asArray();
```

#### *ArrFromCallback* 
Arrayable from callback. Callback must return an `array` or an instance of `Arrayable`

```php
ArrFromCallback(
  fn() => new ArrIf(
    true,
    new ArrFromCallback(
      fn() => [1, 2]
    )
  )
)->asArray(); // [1, 2]
```

#### *ArrTernary*
One more conditionable Arrayble but returns other array if condition is `false`. All advices about using callbacks are relevant.

```php
ArrTernary(
  false,
  fn() => new ArrIf(
    true,
    new ArrFromCallback(fn() => [3, 2, 1])
  )
  [1, 2, 3]
)->asArray(); // [1, 2, 3]
```

#### *ArrSorted*
Sorted by values arrayable. You can use `string` or `callable` as comparison callback.
```php
ArrSorted([3, 2, 1])->asArray(); // [1, 2, 3]
ArrSorted(ArrayableOf::array([3, 2]))->asArray(); // [2, 3]
(new ArrSorted([1, 2, 3], fn($a, $b) => $a >= $b ? -1 : 1))->asArray(); // [3, 2, 1]
```

#### *ArrSortedByKeys*
Sorted by keys arrayable. You can use `string` or `callable` as comparison callback.
```php
ArrSortedByKeys([1 => 32, 3 => 2, 0 => 10])->asArray(); // [0 => 10, 1 => 32, 3 => 2]
```

#### *ArrMapped*
Arrayble mapped with callback
```php
ArrMapped(["foo", "bar"], fn($str) => "Hello, " . $str)->asArray(); // ["Hello, foo", "Hello, bar"]
(new ArrMapped(ArrayableOf::items("foo", "bar"), fn($str) => $str . "!"))->asArray(); // ["foo!", "bar!"]
```

#### *ArrMappedKeyValue*
Arrayble mapped with callback that accepts key an value.
```php
ArrMappedKeyValue([1 => "foo", 10 => "bar"], fn($key, $value) => "$key - $value")->asArray(); // ["1 - foo", "10 - bar"]
(new ArrMappedKeyValue(new ArrTernary(false, [10, 20], [20, 10]), fn($key, $value) => $key + $value))->asArray(); // [21, 11]
```

#### *ArrMerged*
Arrayable merged of arrays/Arrayables.
```php
ArrMerged(
  [1, 2],
  new ArrayableOf([3, 4]),
  new ArrIf(
    true,
    [10, 12]
  ),
  new ArrIf(
    false,
    fn() => [15, 17]
  )
)->asArray(); // [1, 2, 3, 4, 10, 12]
```

#### *ArrKeys* and *ArrValues*
Arrays of keys and values of origin array/Arrayable.
```php
ArrValues(["key1" => "value1", "key2" => "value"])->asArray(); // ["value1", "value2"] // [0 => "value1", 1 => "value2"]
(new ArrKeys(ArrayableOf::array(["key1" => 1, "key2" => 2])))->asArray(); // ["key1", "key2"] // [0 => "key1", 1 => "key2"]
```

#### *ArrReversed*
Reversed arrayable
```php
ArrReversed(new ArrReversed([1, 2, 3]))->asArray(); // [1, 2, 3]
```

#### *ArrSticky*
Arrayable with cache mechanism. Use when you need to call `asArray()` multiple times but you don't want to use regular arrays or call `asArray()` in advance.
```php
$arr = new ArrSticky(
   new ArrMerged(
      [...],
      [...],
      new ArrMerged(
         [...],
         [...],
         new ArrIf(
            true,
            fn() => $database->query()->get()
         )
      )
   )
)
foo($arr); // foo calls $arr->asArray(). Merging and database query will be executed only here
bar($arr); // bar calls $arr->asArray() too. No merging and executing database query
baz($arr); // baz calla $arr->asArray() too. No merging and executing database query
```


#### *ArrUnique*
Arrayable with unique elements.
```php
ArrUnique([1, 1, 2, 3, 3, 4])->asArray(); // [1, 2, 3, 4]
(new ArrUnique(new ArrMerged([1, 2], [2, 3])))->asArray(); // [1, 2, 3]
```

#### *ArrObject*
Arrayable with one element. `asArray` give you \[key => value]. When to use: if you pass somewhere an array with single element and this element is instance of `Arrayable`. You could do it like:
```php
['key' => (new SomeArrayable(...))->asArray()]
```
or you can:
```php
ArrObject(
  'key',
  new SomeArrayble(...)
)->asArray()
```
For example:
```php
ArrMerged(
  [...],
  [...],
  new SomeOtherArrayable(...),
  new ArrObject( // insted of ['key' => (new SomeArrayable(...))->asArray()]
    'key',
    new SomeArrayable(...)
  )
)->asArray()
```
`ArrObject` will be unnecessary soon, when overloading will allow to do \['key' => new SomeArrayable(...)]

## Text
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
