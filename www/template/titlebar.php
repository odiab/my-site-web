  <div id="titlebar">
    <div id="titlebarHeader" onclick="window.location = '/'">
      <img id="titlebarLogo" src="/static/images/od-logo.png" alt="O"/>
      <span id="titlebarName">MAR</span>
    </div>

    <div id='navigation'>
      <?php Template::load('navigation', array('path' => $args['path'])); ?>
      <div id='navButtons'>
        <?php
        $buttons = array(
          'fb' => 'https://www.facebook.com/omar.s.diab',
          'linkedin' => 'https://www.linkedin.com/in/osdiab',
          'github' => 'https://github.com/odiab',
          'phone' => '#',
          'email' => 'mailto:o.s.diab@gmail.com',
        );

        foreach ($buttons as $name => $link)
        {
          echo "<a id='$name-link' href='$link'><img id='$name-img'
            src='/static/images/buttons/$name-button.png' /></a>";
        }
        ?>
      </div>
    </div>
  </div>
