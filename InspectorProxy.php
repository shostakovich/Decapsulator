<?php
class InspectorProxy
{
  private $subject;
  private $object_reflector;
  private $class_reflector;

  public function __construct($subject)
  {
    $this->subject = $subject;
    $this->object_reflector = new ReflectionObject($this->subject);
    $this->class_reflector = new ReflectionClass(get_class($this->subject));
  }

  public function setStaticProperty($name, $val)
  {
    $prop = $this->getProperty($this->class_reflector, $name);
    $prop->setValue($val);
  }

  public function __set($name, $value)
  {
    $prop = $this->getProperty($this->object_reflector, $name);
    $prop->setValue($this->subject, $value);
  }

  public function getStaticProperty($name)
  {
    $prop = $this->getProperty($this->class_reflector, $name);
    return $prop->getValue();
  }

  public function __get($name)
  {
    $prop = $this->getProperty($this->object_reflector, $name);
    return $prop->getValue($this->subject);
  }

  public function __call($name, $args)
  {
    $method = $this->object_reflector->getMethod($name);
    $method->setAccessible(true);
    $arguments = array($this->subject);
    $arguments = array_merge($arguments, $args);
    return call_user_func_array(array($method, "invoke"), $arguments);
  }

  private function getProperty($reflector, $name)
  {
    $property = $reflector->getProperty($name);
    $property->setAccessible(true);
    return $property;
  }
}

