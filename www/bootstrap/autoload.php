<?php

/**
 * Generates generic path format for files in nested dir structures
 * @param $class string Name of class to load
 * @param $dir string Root directory of file
 */
function createPath($class, $dir)
{

  $path = $_SERVER['DOCUMENT_ROOT'];
  if ($path[strlen($path) - 1] != '/') {
    $path .= '/';
  }

  return "$path$dir/$class.php";
}

function assetAutoloader ($class)
{
  $path = createPath($class, 'asset');
  if (file_exists($path)) {
    require_once($path);
  }
}

function modelAutoloader ($class)
{
  $path = createPath($class, 'model');
  if (file_exists($path)) {
    require_once($path);
  }
}

function helperAutoloader ($class)
{
  $path = createPath($class, 'helper');
  if (file_exists($path)) {
    include($path);
  }
}

spl_autoload_register('modelAutoloader');
spl_autoload_register('assetAutoloader');
spl_autoload_register('helperAutoloader');
