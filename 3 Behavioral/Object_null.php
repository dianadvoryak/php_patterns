<?php

interface Worker
{
  public function work();
}

class ObjectManeger
{
  private Worker $worker;

  /**
   * ObjectManager constructor.
   * @param Worker $worker
   */
  public function __construct(Worker $worker)
  {
    $this->worker = $worker;
  }

  public function goWork()
  {
    $this->worker->work();
  }
}

class Developer implements Worker
{
  public function work()
  {
    printf('Developer is working');
  }
}

class NullWorker implements Worker
{
  public function work()
  {
    
  }
}

$developer = new Developer();
$nullableDeveloper = new NullWorker();

$objectManager = new ObjectManeger($developer);
// $objectManager = new ObjectManeger($nullableDeveloper);

$objectManager->goWork();