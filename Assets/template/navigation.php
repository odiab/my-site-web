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
      $class = 'navLink';
      if ($section == $cur) {
        $class .= ' current';
      }
      if ($i == $numSections - 1) {
        $class .= ' last';
      }

      echo "<li class='navli'><a class='$class' href='/$cur'>$cur</a></li>";
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
?>
    <a id=<?php echo "'$name-link'" ?> class='navButton'
       href=<?php echo "'$link'" ?> >
      <!--[if lte IE 8]>
        <img id=<?php echo "'$name-img'" ?> class='navButtonImg'
        src='/static/images/buttons/<?php echo "$name-button" ?>.png' />
      <![endif]-->
      <img id=<?php echo "'$name-img'"?> class='navButtonImg'
      src='/static/images/buttons/<?php echo "$name-button" ?>.svgz' />
    </a>
<?php
  }
  ?>
</div>
