<?php
require_once("./lime.php");
require_once("./InspectorProxy.php");
require_once("./TestSubject.php");

$subject = new TestSubject();
$proxy = new InspectorProxy($subject);

$t = new lime_test();

$t->is($proxy->private_var, "foo", "Gets private property on subject");
$t->is($proxy->protected_var, "foo", "Gets protected property on subject");
$t->is($proxy->getStaticProperty("protected_static"), "foo", "Gets static property on subject");

$proxy->private_var = "bar";
$t->is($proxy->private_var, "bar", "Sets private property on subject");

$proxy->protected_var = "bar";
$t->is($proxy->protected_var, "bar", "Sets protected property on subject");

$proxy->setStaticProperty("protected_static", "bar");
$t->is($proxy->getStaticProperty("protected_static"), "bar", "Sets a static property");

$t->is($proxy->privateMethod("foo", "bar"), "foobar", "Calls private method");
$t->is($proxy->protectedMethod("foo", "bar"), "foobar", "Calls proteced method");



