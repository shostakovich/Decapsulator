<?php
class Decapsulator
{
  private $subject;
  private $reflector;

  public function __construct($subject)
  {
    $this->subject = $subject;
    $this->reflector = new ReflectionObject($this->subject);
  }

  public function __set($name, $value)
  {
    $this->setProperty($name, $value);
  }

  public function __get($name)
  {
    return $this->getProperty($name);
  }

  public function __call($name, $params)
  {
    return $this->callMethod($name, $params);
  }

  public function setStatic($name, $value)
  {
    $this->setProperty($name, $value);
  }

  public function getStatic($name)
  {
    return $this->getProperty($name);
  }

  public function callStatic($name, $params=array())
  {
    return $this->callMethod($name, $params);
  }

  /**
   * Calls a method on $subject
   * @param String $name of the method
   * @param Array $params of the method
   * @return mixed
   */
  private function callMethod($name, $params)
  {
    $method = $this->reflector->getMethod($name);
    $method->setAccessible(true);
    $params = array_merge(array($this->subject), $params);
    return call_user_func_array(array($method, "invoke"), $params);
  }

  /**
   * Returns a property from $subject
   * @param String $name of property
   * @return mixed
   */
  private function getProperty($name)
  {
    $property = $this->reflector->getProperty($name);
    $property->setAccessible(true);
    return $property->getValue($this->subject);
  }

  /**
   * Sets a property on $subject
   * @param String $name of property
   * @param mixed $val to set it to
   * @return void
   */
  private function setProperty($name, $val)
  {
    $property = $this->reflector->getProperty($name);
    $property->setAccessible(true);
    return $property->setValue($this->subject, $val);
  }
}

