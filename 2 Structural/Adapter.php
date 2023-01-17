<?php

interface NativeWorker
{
  public function countSalary(): int;
}

interface OutsourceWorker
{
  public function countSalaryByHour($hour): int;
}

class NativeDeveloper implements NativeWorker
{
  public function countSalary(): int
  {
    return 3000 * 20;
  }
}

class OutsourceDeveloper implements OutsourceWorker
{
  public function countSalaryByHour($hour): int
  {
    return $hour * 500;
  }
}

class OutsourceWorkerAdapter implements NativeWorker
{
  private OutsourceWorker $outsourceWorker;

  /**
   * OutsourceWorkerAdapter constructor.
   * @param OutsourceWorker $outsourceWorker
   */
  public function __construct(OutsourceWorker $outsourceWorker)
  {
    $this->outsourceWorker = $outsourceWorker;
  }

  public function countSalary(): int
  {
    return $this->outsourceWorker->countSalaryByHour(80);
  }
}

$nativeDeveloper = new NativeDeveloper();
$outsourceDeveloper = new OutsourceDeveloper();

$outsourceDeveloper = new OutsourceWorkerAdapter($outsourceDeveloper);

var_dump($nativeDeveloper->countSalary());
var_dump($outsourceDeveloper->countSalary());