<?php
/**
 * Defines how URI's are mapped to controller methods.
 * Version 0: direct mapping from URI name to controller load method.
 */
class Router {
  /**
   * Generates response based on path.
   */
  public function load() {
    $path = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    // render page
    Template::load('head');
    Template::load('body');
  }
}
