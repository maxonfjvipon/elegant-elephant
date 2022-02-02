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
 | No instanceof, type casting, or reflection | :heavy_check_mark:         |
 | No public methods without a contract | :heavy_check_mark:         |
 | No statements in test methods except assertThat | :heavy_minus_sign:  |

## Static methods
Every class has at least one `public static` method (mostly it's `new` method). Motivation: getting rid of extra brackets `(` and `)` around the `new Class` if we want to call method just after object creating. 

For example, if we write regular in a regular way:
```php
(new LengthOf("foo"))->asNumber();
```

Example from the library (no extra brackets, looks prettier in my opinion):
```php
LengthOf::new("foo")->asNumber();
```
Constuctors are public, so if you want, you can use them instead of this static `new`

Let's see what's inside.

## Arrayable
Elegant arrays

*ArrayableOf* - just `array` decorator
```php
ArrayableOf::array([1, 2])->asArray(); // [1, 2]
ArrayableOf::items(1, 2)->asArray(); // [1, 2]
(new ArrayableOf([1, 2]))->asArray(); // [1, 2]
```
 
*ArrSorted* - sorted arrayable
```php
ArrSorted::new([3, 2, 1])->asArray(); // [1, 2, 3]
ArrSorted::new(ArrayableOf::array([3, 2]))->asArray(); // [2, 3]
(new ArrSorted([1, 2, 3], fn($a, $b) => $a >= $b ? -1 : 1))->asArray(); // [3, 2, 1]
```

*ArrExploded* - arrayable exploded by separator. The library support [arguments overloading](https://github.com/maxonfjvipon/overloaded-elephant), so you can provide arguments not only of `string` type (`Text` for example)
```php
ArrExploded::new("-", "foo-bar")->asArray(); // ["foo", "bar"]
ArrExploded::new(TextOf::new("-"), "foo-bar")->asArray(); // ["foo", "bar"]
ArrExploded::byComma(new TextOf("foo,bar"))->asArray(); // ["foo", "bar"]
```

*ArrMapped* - arrayble mapped with callback
```php
ArrMapped::new(["foo", "bar"], fn($str) => "Hello, " . $str)->asArray(); // ["Hello, foo", "Hello, bar"]
(new ArrMapped(ArrayableOf::items("foo", "bar"), fn($str) => $str . "!"))->asArray(); // ["foo!", "bar!"]
```

*ArrKeys* and *ArrValues* - arrays of keys and values of origin array/Arrayable.
```php
ArrValues::new(["key1" => "value1", "key2" => "value"])->asArray(); // ["value1", "value2"] // [0 => "value1", 1 => "value2"]
(new ArrValues(ArrayableOf::array(["key1" => 1, "key2" => 2])))->asArray(); // ["key1", "key2"] // [0 => "key1", 1 => "key2"]
```

*ArrMerged* - arrayable merged of arrays/Arrayables.
```php
ArrMerged::new(
  [1, 2],
  new ArrayableOf([3, 4])
)->asArray(); // [1, 2, 3, 4]
```

And so on...

## Text
Elegant strings

*TextOf* - just `string` decorator
```php
TextOf::new("foo")->asString(); // "foo"
(new TextOf(22))->asString(); // "22"
TextOf::new(1.2)->asString(); // "1.2"
```

*TxtUpper* - text in upper case. Almost every class has 2 ways of creation: from string and from text. So there are 2 static methods:
```php
TxtUpper::new("bar")->asString(); // "BAR"
TxtUpper::new(TextOf::new("foo"))->asString(); // "FOO"
```

*TxtLowered* - text in lower case.
```php
TxtLowered::new("BAR")->asString(); // "bar"
TxtLowered::new(
  TxtUpper::new("foo")
)->asString(); // "foo"
```

*TxtImploded* - text imploded with separator. One more class with 2 chained methods required to create an object.
```php
TxtImploded::new("-", "foo", "bar")->asString(); // "foo-bar"
TxtImploded::new("-", new TextOf("foo"), "bar")->asString(); // "foo-bar"
TxtImploded::withComma(TextOf::string("foo"), TxtUpper::ofString("bar"), "dash")->asString(); // "foo,BAR,dash"
```

*TxtJoined* - alias to `TxtImploded` without separator
```php
TxtJoined::new("foo", ",", TextOf::new("bar"))->asString(); // "foo,bar"
```

*TxtReplaced* - find string and replace it. 
```php
TxtReplcaed::new("foo", TxtUpper("bar"), "foobar")->asString(); // "BARbar"
```

And so on...

## Logical
Elegant boolean

*PregMatch* - match regex
```php
PregMatch::new("/foo/", TextOf::string("foobar"))->asBool(); // true
(new PregMatch(TxtLowered::new("FOO"), "foo-bar"))->asBool(); // true
```

*Conjunction* and *Disjunction* - logical AND and OR. (Php doesn't allow you to name classes with reserved words)
```php
Conjunction::new(
  Truth::new(),
  true,
  LogicalOf::bool(true),
  new KeyExists("foo", ["foo" => 1, "bar" => 2]),
  PregMatch::new("/foo/", "foobar")
)->asBool(); // true
```

*EqualityOf* - equality. You may check equality of texts, strings, ints, floats, booleans, arrays, arrayables, numerables.
```php
EqualityOf::new("foo", new TextOf("bar"))->asBool(); // false
EqualityOf::new(ArrayableOf::items(1, 2), [1, 2])->asBool(); // true
EqualityOf::new(2, new NumerableOf(TextOf::new("2")))->asBool(); // true
```

And so on...

## Numerable
Elegant numbers.

*LengthOf* - may decorates length of Text, string, array, arrayable, ;
```php
Equality::new(
  NumerableOf::new("5"),
  new LengthOf(new TextOf("Hello"))
)->asBool(); // true

LengthOf::new([1, 2])->asNumber(); // 2
```

*Addition, Subtraction, Decremented, Incremented* - basic arithmetic operations.

## Proc and Func (Experimental)
*Proc* incapculate function that returns nothing, *Func* incapsulate function that returns something.

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
There are so may classes you and me may create. So if you are interesting, send a pull request. Be sure to write tests and they passed.
