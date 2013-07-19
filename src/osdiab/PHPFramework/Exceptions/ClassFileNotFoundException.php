<?php
namespace osdiab\PHPFramework\Exceptions;

class ClassFileNotFoundException extends RuntimeException
{
  public function __construct($class, $path) {
    parent::__construct("$class at path '$path' not found");
  }
}
