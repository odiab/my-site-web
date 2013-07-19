<?php
use osdiab\PHPFramework as FW;
?>
<div id="titlebar">
  <div id="titlebarHeader" onclick="window.location = '/'">
    <img id="titlebarLogo" src="/static/images/od-logo.png" alt="O"/>
    <span id="titlebarName">MAR</span>
  </div>

  <div id='navigation'>
    <?php FW\Assets\Template::load('navigation', array('path' => $args['path'])); ?>
  </div>
</div>
