<?php
class TestSubject
{
  private $private_var="foo";
  protected $protected_var="foo";
  protected static $protected_static="foo";

  private function privateMethod($a, $b)
  {
    return "$a$b";
  }

  private function protectedMethod($a, $b)
  {
    return "$a$b";
  }
}