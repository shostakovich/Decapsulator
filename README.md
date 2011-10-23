README
======

What is Decapsulator?
---------------------

Decapsulator allows you to access private and protected properties from within your tests.

How does it work?
-----------------

I wanted that Decapsulator has a very unspectacular interface. So I used PHP's magic methods.
Decapsulator just feels like accessing public methods/properties on the Object in decapsulates.

<pre>
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
</pre>

Is there a drawback?
--------------------

Yes. Currently Decapsulator has a quite verbose Syntax for accessing static methods/properties.

<pre>
<?php

class Subject
{
   protected static $secret_sauce;
}

$subject = new Subject();

$decapsulated_subject = new Decapsulator($subject);
$decapsulated_subject->getStatic("secret_sauce");
?>
</pre>

When should I not use this?
---------------------------

Do yourself a favor and do not use it to fight against bad design. Its not made for use in production!
