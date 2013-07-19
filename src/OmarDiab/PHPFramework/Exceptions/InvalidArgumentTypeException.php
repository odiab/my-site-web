<?php
namespace OmarDiab\PHPFramework\Exceptions;

class InvalidArgumentTypeException extends InvalidArgumentException
{
  public function __construct($varname, $intended, $actual)
  {
    parent::__construct(
      $varname . ' must be a ' . $intended . ', instead was a ' . $actual
    );
  }
}
