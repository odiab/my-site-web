<?php
class Page extends Asset
{
  public static function load($path, $args=array())
  {
    if (!is_string($path)) {
      throw new InvalidCalledClassException(
        "Invalid name, must be a string"
      );
      return false;
    }

    return Template::load('page', array('path' => $path));
  }
}
