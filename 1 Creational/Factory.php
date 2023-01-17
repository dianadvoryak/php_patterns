<?php

class Worker
{
  private string $name;

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @param sting $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }
}

class WorkerFactory
{
  public static function make(): Worker
  {
    return new Worker();
  }
}

$worker = WorkerFactory::make();
$worker->setName('Jon');
var_dump($worker->getName());