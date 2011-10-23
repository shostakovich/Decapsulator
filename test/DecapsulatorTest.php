<?php
require_once("./lime.php");
require_once("../Decapsulator.php");
require_once("./TestSubject.php");

$subject = new TestSubject();
$proxy = new Decapsulator($subject);

$t = new lime_test();

$t->is($proxy->private_var, "foo", "Gets private property on subject");
$t->is($proxy->protected_var, "foo", "Gets protected property on subject");
$t->is($proxy->public_var, "foo", "Gets public property on subject");
$t->is($proxy->getStatic("protected_static"), "foo", "Gets static property on subject");

$proxy->private_var = "bar";
$t->is($proxy->private_var, "bar", "Sets private property on subject");

$proxy->protected_var = "bar";
$t->is($proxy->protected_var, "bar", "Sets protected property on subject");

$proxy->public_var = "bar";
$t->is($proxy->public_var, "bar", "Sets protected property on subject");


$proxy->setStatic("protected_static", "bar");
$t->is($proxy->getStatic("protected_static"), "bar", "Sets a static property");

$t->is($proxy->privateMethod("foo", "bar"), "foobar", "Calls private method");
$t->is($proxy->protectedMethod("foo", "bar"), "foobar", "Calls proteced method");
$t->is($proxy->publicMethod("foo", "bar"), "foobar", "Calls public method");

$t->is($proxy->callStatic("privateStaticMethod", array("foo", "bar")), "foobar", "Calls private static method");
$t->is($proxy->callStatic("privateStaticMethodWithoutParams"), "foobar", "Calls private static method");
$t->is($proxy->callStatic("protectedStaticMethod", array("foo", "bar")), "foobar", "Calls protected static method");
$t->is($proxy->callStatic("publicStaticMethod", array("foo", "bar")), "foobar", "Calls public static method");

