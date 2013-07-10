<?php
  $sections = array(
    'thoughts',
    'projects',
    'resume',
  );

  // get current page, root dir
  if (!isset($args['path'])) {
    $args['path'] = 'home';
  }

  $section = Page::extractSectionFromPath($args['path']);
  if ($section == '') {
    $section = 'home';
  }
?>

<div id="navLinks">
  <ul id="navList">
    <?php
    $i = 0;
    $numSections = count($sections);
    // generate links to pages
    for ($i = 0; $i < $numSections; ++$i) {
      $cur = $sections[$i];
      $class = '';
      if ($section == $cur) {
        $class .= 'current';
      }
      if ($i == $numSections - 1) {
        $class .= ' last';
      }

      echo "<li><a class='$class' href='/$cur'>$cur</a></li>";
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
