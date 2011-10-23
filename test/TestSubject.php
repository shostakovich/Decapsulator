<?php
class TestSubject
{
  private $private_var="foo";
  protected $protected_var="foo";
  public $public_var="foo";
  protected static $protected_static="foo";

  private function privateMethod($a, $b)
  {
    return "$a$b";
  }

  private function protectedMethod($a, $b)
  {
    return "$a$b";
  }

  public function publicMethod($a, $b)
  {
    return "$a$b";
  }

  private static function privateStaticMethod($a, $b)
  {
    return "$a$b";
  }

  protected static function protectedStaticMethod($a, $b)
  {
    return "$a$b";
  }

  public static function publicStaticMethod($a, $b)
  {
    return "$a$b";
  }

  public static function privateStaticMethodWithoutParams()
  {
    return "foobar";
  }
}