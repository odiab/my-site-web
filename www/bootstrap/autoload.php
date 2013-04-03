<?php

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
    include($path);
  }
}

function modelAutoloader ($class)
{
  $path = createPath($class, 'model');
  if (file_exists($path)) {
    include($path);
  }
}

spl_autoload_register('modelAutoloader');
spl_autoload_register('assetAutoloader');
