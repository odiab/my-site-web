<?php
header("Content-type: text/css; charset: UTF-8");
$dir = ".";
$styles = glob("$dir/*.css");

foreach($styles as $style)
{
  echo file_get_contents($style) . "\n";
}
