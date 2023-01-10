<?php

final class Connection
{
  private static ?self $instance = null;
  private static string $name;

  /**
   * @return string
   */
  public static function getName(): string
  {
    return self::$name;
  }

  /**
   * @param string $name
   */
  public static function setName(string $name): void
  {
    self::$name = $name;
  }

  public static function getInstance(): self
  {
    if(self::$instance === null){
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function __clone():void
  {

  }

  public function __wakeup()
  {
    
  }
}

$connection1 = Connection::getInstance();
$connection1::setName('Laravel');

$connection2 = Connection::getInstance();
$connection2::setName('Symphony');

var_dump($connection2::getName());