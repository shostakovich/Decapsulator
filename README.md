README
======

What is Decapsulator?
---------------------

Decapsulator allows you to access private and protected properties from within your tests.

How does it work?
-----------------


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