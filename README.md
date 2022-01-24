# ElegantElephant (In development)

ElegantElephant - trying to write php code in elegant way. Inspired by [Cactoos](https://github.com/yegor256/cactoos) from [@yegor256](https://github.com/yegor256).

[![EO principles respected here](https://www.elegantobjects.org/badge.svg)](https://www.elegantobjects.org)

## Principles
- No null
- No code in constructors (why?)
- No getters and setters (why?)
- No mutable objects (why?)
- No instanceof, type casting, or reflection (why?)
- No public methods without a contract (interface) (why?)

## Static methods
Library is full of `public static` methods and here's why. As you know classes in php may have only one `__construct` method. Also there is no methods overloading in php. So, if we want to provide to user many ways to create an object, we have 2 ways:
1. No static methods. For every new parameters combination we create new class
2. Make constructor private and for every new parameters combination we make `public static` method with different arguments that all call constructor.

I decided to stick with the second strategy. It seems to me more prettier. In this way static methods behave just like constructors and return new object. 
Why is `__construct` method private? Just for making code look the same. 

One more benefit of this: we're getting rid of extra brackets `(` and `)` around the `new Class` if we want to call method just after object creating. 

For example, if we write regular php:
```php
(new Foo())->bar();
```

Example from the library (no extra brackets, looks prettier):
```php
LengthOf::string("foo")->asNumber();
```

Let's see what's inside.

## Arrayable
Elegant arrays

*ArrayableOf* - just `array` decorator
```php
ArrayableOf::array([1, 2])->asArray(); // [1, 2]
```
 
*ArrSorted* - sorted arrayable
```php
ArrSorted::ofArray([3, 2, 1])->asArray(); [1, 2, 3]
ArrSorted::ofArrayble(ArryableOf::array([3, 2]))->asArray(); // [2, 3]
ArrSorted::ofArray([1, 2, 3], fn($a, $b) => $a >= $b ? -1 : 1)->asArray(); // [3, 2, 1]
```

*ArrExploded* - arrayable exploded by separator. `explode` method has 2 arguments, both strings. But we want to give to user a choice, what type of argument he wants to pass. So to create the `ArrExploded` object, you need to call to chain of methods:
```php
ArrExploded::byString("-")->ofString("foo-bar")->asArray(); // ["foo", "bar"]
ArrExploded::byText(TextOf::string("-"))->ofText(TextOf::string("foo-bar")->asArray(); ["foo", "bar"]
ArrExploded::byComma()->ofString("foo,bar")->asArray(); ["foo", "bar"]
```
**Note** that you won't be able to call `asArray()` after calling by- method.

*ArrMapped* - arrayble mapped with callback
```php
ArrMapped::ofArray(["foo", "bar"], fn($str) => "Hello, " . $str)->asArray(); // ["Hello, foo", "Hello, bar"]
ArrMapped::ofArryable(...)->asArray();
```

*ArrKeys* and *ArrValues* - arrays of keys and values of origin array/Arrayable.

*ArrMerged* - arrayable merged of arrays/Arrayables.
```php
ArrMerged::ofArrays(
  [1, 2],
  [3, 4]
)->asArray(); // [1, 2, 3, 4]
```

And so on...

## Text
Elegant strings

*TextOf* - just `string` decorator
```php
$foo = TextOf::string("foo")->asString(); // "foo"
```
*TxtUpper* - text in upper case. Almost every class has 2 ways of creation: from string and from text. So there are 2 static methods:
```php
TxtUpper::ofString("bar")->asString(); // "BAR"
TxtUpper::ofText($foo)->asString(); // "FOO"
```

*TxtLowered* - text in lower case.
```php
TxtLowered::ofString("BAR")->asString(); // "bar"
TxtLowered::ofText(
  TxtUpper::ofString("foo")
)->asString(); // "foo"
```

*TxtImploded* - text imploded with separator. One more class with 2 chained methods required to create an object.
```php
TxtImploded::withString("-")->ofStrings("foo", "bar")->asString(); // "foo-bar"
TxtImploded::withComma()->ofTexts(TextOf::string("foo"), TxtUpper::ofString("bar"))->asString; // "foo,Bar"
```

*TxtJoined* - alias to `TxtImploded` without separator
```php
TxtImploded::ofStrings("foo", ",", "bar")->asString(); // "foo-bar"
TxtImploded::ofTexts(...)->asString();
```

And so on...

## Logical
Elegant boolean

*MatchTo* - match regex
```php
MatchTo::string("/foo/")->inText(TextOf::string("foobar"))->asBool(); // true
MatchTo::text(TxtEnsureRegex::ofString("foo"))->inString("foo-bar")->asBool(); // true
```

*Conjunction* and *Disjunction* - logical AND and OR. (Php doesn't allow you to name classes with reserved words)
```php
Conjunction::new(
  Truth::new(),
  LogicalOf::bool(true),
  KeyExists::inArray("foo", ["foo" => 1, "bar" => 2]),
  MatchTo::string("/foo/")->inString("foobar")
)->asBool(); // true
```

*EqualityOf* - equality. You may check equality of texts, string, arrays, arrayables, numerables.
```php
EqualityOf::strings("foo", "bar")->asBool(); // false
EqualityOf::arrays([1, 2], [1, 2])->asBool(); // true
EqualityOf::texts(TextOf::string("FOO"), TxtUpper::ofString("foo"))->asBool(); true
```

And so on...

## Numerable
Elegant numbers. Method `asNumber` returns `string`. Check [numeric strings](https://www.php.net/manual/en/language.types.numeric-strings.php) in php.net

*LengthOf* - may decorates length of text, string, array, arrayable;
```php
Equality::ofNumerables(
  NumerableOf::string("5"),
  LengthOf::text(TextOf("Hello"))
)->asBool(); // true

LengthOf::array([1, 2])->asNumber(); // "2"
```

*Addition, Subtraction, Decremented, Incremented" - basic arithmetic operations.
Inside `TxtEnsureRegex` class:
```php
public function asString(): string
{
  $slash = TextOf::string("/");
  $blank = TxtBlank::new();
  return TxtJoined::ofTexts(
    TxtTernary::ofTexts(
      Negation::new(
        EqualityOf::texts(
          TxtSubstr::ofText($this->origin, 0, 1),
          $slash
        )
      ),
      $slash,
      $blank
    ),
    $this->origin,
    TxtTernary::ofTexts(
      Negation::new(
        EqualityOf::texts(
          TxtSubstr::ofText(
            $this->origin,
              Decremented::new(
                LengthOf::text($this->origin)
              )->asNumber(),
            1),
          $slash
        ),
      ),
      $slash,
      $blank
    )
  )->asString();
}
```

## Proc and Func (Experimental)
*Proc* incapculate function that returns nothing, *Func* incapsulate function that returns something.

*Cycle* - Object Oriented ForEach.
```php
$num = 0;
Cycle::withCallable(
  static function($elem) use (&$num) {
    $num += $elem;
  }
)->exec([1, 2, 3, 4]); // $num is 10

$num = 0;
Cycle::withProc(
  Cycle::withCallable(
    statinc function ($elem) use (&$num) {
      $num += $elem;
    }
  )
)->exec([[1, 2], [3, 4]]); // $num is 10
```

## Contribution
I'll be glad if you want to improve something or add new features, new classes, etc...
Just make sure, you wrote tests and they passed.
