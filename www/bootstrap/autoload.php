<?php

function assetAutoloader ($class)
{
  $path = $_SERVER['DOCUMENT_ROOT'];
  if ($path[strlen($path) - 1] != '/') {
    $path .= '/';
  }

  $path .= "assets/$class.php";
  if (!file_exists ($path)) {
    trigger_error (
      "Invoked non-existent asset class ('$class')", E_USER_WARNING
    );
  } else {
    include($path);
  }
}

spl_autoload_register('assetAutoloader');
