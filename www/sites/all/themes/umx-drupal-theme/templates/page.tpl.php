<?php
// $Id$

/**
 * @file
 * Core layout for every page
 */
 
?>
  <script type="text/javascript">accessibility(); jQuery(document).ready(function() { main(); });</script>
    <div id="fixed-header">
        <!-- Header -->
        <div id="header" class="shadowed curved-bottom">
          <div class="container">
            <?php print $menu; ?>
            <?php print $logo; ?>
            
            <!--<div id="logo">  -->
              <!--
                 -<div id="ubuntu-mx-sites">
                 -    <a class="active" id="" href="http://ubuntumexico.org/">web</a>
                 -    <a href="http://wiki.ubuntu.com/UbuntuMxTeam/">wiki</a>
                 -    <a id="" href="http://ubuntumexico.org/forum">foro</a>
                 -    <a id="" href="http://ubuntu.shapado.com/">preguntas</a>
                 -    <a id="" href="#">irc</a>
                 -    <a id="" href="#">planeta</a>
                 -</div>
                 -->
              <!--<span class="suffix">web</span><span class="title">ubuntu-mx</span>-->
              <!--<span class="description">comunidad mexicana</span>-->
            <!--</div>  -->
            
            <div class="buttons">
              <div id="accessibility" title="cambiar colores de fondo" onclick='accessibility_toggle();'></div>
            </div>
            <?php if ($search) { ?>
              <div class="block block-theme">
                <?php print $search ?>
              </div>
            <?php } ?>
          </div>
        </div>

        <!-- Sub Header -->
        <?php if ($secondary_menu or $submenu) { ?>
          <div id="subheader">
            <div class="container">
              <div class="container-inside">
                  <?php print $submenu; ?>
                  <?php print render($page['secondary_menu']); ?>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>    
    <!-- Content -->
    <div id="content">
      <div id="content-top"> </div>
      <div class="container">
        <?php print render($page['above_content']);  ?>
        <?php if ($show_messages) { print $messages; } ?>
         <?php print (theme_get_setting('display_help')) ? render($page['help']) : NULL; ?>

        <?php   # Add sidebar only in news pages
            if (module_exists('path'))
                $alias = drupal_get_path_alias();
            if ((isset($node) && $node->type == 'news') || $alias == "admin/structure/block") {
                if ($page['left']) {
                    print('<div id="sidebar-left" class="sidebar">');
                    print render($page['left']);
                    print('</div>');
                }
                if ($page['right']) {
                    print('<div id="sidebar-right" class="sidebar">');
                    print render($page['right']);
                    print('</div>');
                }
            }
        ?>

        <div id="center" <?php if (isset($node) && $node->type != ''): ?>class="<?php print $node->type ?>"<?php endif; ?>>
          <?php print $breadcrumb; ?>
          <?php print render($page['top_content']) ?>
          <?php if (isset($node) && $node->type != 'panel'): ?>
            <h1 class="page-title"> <?php print $title; ?> </h1>
          <?php endif; ?>
          <?php if ($tabs) { print render($tabs); } ?>
          <?php print render($page['content']); ?>
        </div>
      </div>
      <div id="content-bottom"> </div>
    </div>
    <!-- Footer -->
      <div id="footer">
        <div class="container">
            <?php if ($ubuntu_footer_text) { ?>
              <div class="disclaimer">
                <?php print $ubuntu_footer_text ?>
              </div>
            <?php } ?>
          <!--<?php print render($page['footer']);?>-->
          <!--<?php print render($page['closure']); ?>-->
        </div>
      </div>
    <?php # Check if page is panel then run "panels()" script
      if (isset($node) && $node->type == 'panel')
        echo "<script type='text/javascript'>panels();</script>\n";
    ?>
