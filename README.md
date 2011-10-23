README
======

What is Decapsulator?
---------------------

Decapsulator allows you to access private and protected properties from within your tests.

It behaves like the decapsulated object!
----------------------------------------

I wanted that Decapsulator has a very unspectacular interface. So I used PHP's magic methods.
Decapsulator just feels like accessing public methods/properties on the Object in decapsulates.

```php
<?php

class Subject
{
   protected $secret_sauce;

   private function doSomething()
   {
     return "foobar";
   }
}

$subject = new Subject();

$decapsulated_subject = new Decapsulator($subject);
$decapsulated_subject->doSomething();
$decapsulated_subject->secret_sauce;
?>
```

Really exactly?
---------------

Ok - i lied ;) Currently Decapsulator has a quite verbose Syntax for accessing static methods/properties.

```php
<?php

class Subject
{
   protected static $secret_sauce;
}

$subject = new Subject();

$decapsulated_subject = new Decapsulator($subject);
$decapsulated_subject->getStatic("secret_sauce");
?>
```

When should I not use Decapsulation
-----------------------------------

Do yourself a favor and do not use it to fight against bad design.
Reflection on every call is not made for use in production..
