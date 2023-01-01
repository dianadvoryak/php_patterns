<?php

interface Mediator
{
  public function getWorker();
}

abstract class Worker
{
  private string $position;

  /**
   * Worker constructor.
   * @param string $position
   */
  public function __construct(string $position)
  {
    $this->position = $position;
  }

  public function sayHello()
  {
    printf('Hello');
  }

  public function work(): string
  {
    return $this->position . ' is working';
  }
}

class InfoBase
{
  public function printInfo(Worker $worker)
  {
    printf($worker->work());
  }
}

class WorkerInfoBaseMediator implements Mediator
{
  private Worker $worker;
  private InfoBase $infobase;

  /**
   * WorkerInfoBaseMediator constructor.
   * @param Worker $worker
   * @param InfoBase $infobase
   */

  public function __construct(Worker $worker, InfoBase $infobase)
  {
    $this->worker = $worker;
    $this->infobase = $infobase;
  }

  public function getWorker()
  {
    $this->infobase->printInfo($this->worker);
  }
}

class Developer extends Worker
{

}

class Designer extends Worker
{

}

$developer = new Developer('Jon - developer middle');
$designer = new Designer('Bob - designe senior');
$infobase = new InfoBase();
$workerInfoBaseMediator1 = new WorkerInfoBaseMediator($developer, $infobase);
$workerInfoBaseMediator2 = new WorkerInfoBaseMediator($designer, $infobase);

$workerInfoBaseMediator1->getWorker();
$workerInfoBaseMediator2->getWorker();