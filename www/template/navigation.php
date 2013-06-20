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
  $current = Asset::formatPath($current, array('.php' => FALSE));
  $first = strpos($current, '/');
  if ($first !== FALSE) {
    $current = substr($current, 0, $first);
  }

  if ($current == '') {
    $current = 'home';
  }
?>

<div id="navLinks">
  <ul id="navList">
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
</div>

<div id='navButtons'>
  <?php
  $buttons = array(
    'fb' => 'https://www.facebook.com/omar.s.diab',
    'linkedin' => 'https://www.linkedin.com/in/osdiab',
    'github' => 'https://github.com/odiab',
    'email' => 'mailto:o.s.diab@gmail.com',
  );

  foreach ($buttons as $name => $link)
  {
    echo "<a id='$name-link' href='$link'><img id='$name-img'
      src='/static/images/buttons/$name-button.png' /></a>";
  }
  ?>
</div>
