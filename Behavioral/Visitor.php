<?php

interface WorkerVisitor
{
  public function visitorDeveloper(Worker $worker);
  public function visitorDesigner(Worker $worker);
}

class RecorderVisitor implements WorkerVisitor
{
  private array $visited = [];

  public function visitorDeveloper(Worker $developer)
  {
    $this->visited[] = $developer;
  }

  public function visitorDesigner(Worker $designer)
  {
    $this->visited[] = $designer;
  }

  /**
   * @return array
   */
  public function getVisited():array
  {
    return $this->visited;
  }
}

interface Worker
{
  public function work();

  public function accept(WorkerVisitor $visitor);
}

class Developer implements Worker
{
  public function work()
  {
    printf('developer is working');
  }

  public function accept(WorkerVisitor $visitor)
  {
    $visitor->visitorDeveloper($this);
  }
}

class Designer implements Worker
{
  public function work()
  {
    printf('designer is working');
  }

  public function accept(WorkerVisitor $visitor)
  {
    $visitor->visitorDesigner($this);
  }
}

$visitor = new RecorderVisitor();

$developer = new Developer();
$designer = new Designer();

$developer->accept($visitor);
$designer->accept($visitor);

// var_dump($visitor->getVisited());

foreach($visitor->getVisited() as $worker){
  $worker->work();
}