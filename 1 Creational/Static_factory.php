<?php

interface Worker
{
  public function work();
}

class Developer implements Worker
{
  public function work()
  {
    printf('Im developing');
  }
}

class Designer implements Worker
{
  public function work()
  {
    printf('Im designing');
  }
}

class WorkerFactory
{
  public static function make($workerTitle): ?Worker
  {
    $ClassName = strtoupper($workerTitle);

    if(class_exists($ClassName)){
      return new $ClassName;
    }
    return null;
  }
}

$developer = WorkerFactory::make('developer');

$developer->work();