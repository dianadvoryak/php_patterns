<?php

interface Command
{
  public function execute();
}

interface Undoable extends Command
{
  public function undo();
}

class Output
{
  private bool $isEnable = true;

  private string $body;

  public function enable()
  {
    $this->isEnable = true;
  }

  public function disable()
  {
    $this->isEnable = false;
  }

  /**
   * @return string
   */
  public function getBody(): string
  {
    return $this->body;
  }

  public function write($str){
    if($this->isEnable){
      $this->body = $str;
    }
  }
}

class Invoker 
{
  private Command $command;

  /**
   * Invoker constructor.
   * @param Command $command
   */
  public function __construct(Command $command)
  {
    $this->command = $command;
  }
  public function run()
  {
    $this->command->execute();
  }
}