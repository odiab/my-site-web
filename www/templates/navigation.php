<?php
  $links = array(
    'home' => 'Home',
    'staff' => 'Meet Our Staff',
    'participants' => 'For Participants',
    'sponsors' => 'For Sponsors',
    'locations' => 'Locations',
    'contact' => 'Contact Us',
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
  // generate links to pages
  if ($highlight) {
    foreach ($links as $key => $value) {
      $class = '';
      if ($current == $key) {
        $class .= 'current';
      }
      echo "<li><a class='$class' href='/$key'>$value</a></li>";
    }
  }
  ?>
</ul>
