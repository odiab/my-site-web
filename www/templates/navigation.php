<?php
  $links = array(
    'edu' => 'edu',
    'work' => 'work',
    'projects' => 'projects',
  );

  $highlight = true;

  // get current page, root dir
  if (!isset($args['path'])) {
    $args['path'] = '';
    $highlight = false;
  }

  $current = $args['path'];
  $current = Assets::formatPath($current, array('.php' => FALSE));
  $first = strpos($current, '/');
  if ($first !== FALSE) {
    $current = substr($current, 0, $first);
  }

  if ($current == '') {
    $current = 'home';
  }
?>

<ul id="nav">
  <?php
  $i = 0;
  $num = count($links);
  // generate links to pages
  foreach ($links as $key => $value) {
    $class = '';
    if ($highlight) {
      if ($current == $key) {
        $class .= 'current';
      }
    }
    if ($i == $num - 1) {
      $class .= ' last';
    }

    echo "<li><a class='$class' href='/$key'>$value</a></li>";
    ++$i;
  }
  ?>
</ul>
