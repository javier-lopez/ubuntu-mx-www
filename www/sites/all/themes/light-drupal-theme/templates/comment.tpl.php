<?php
?>
<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status; print ' '. $zebra; ?>">

  <div class="clear-block">
  <?php print render($picture); ?>

    <div class="content">
      <?php print render($content); ?>
      <?php if ($signature): ?>
      <div class="clear-block">
        <div>—</div>
        <?php print $signature ?>
      </div>
      <?php endif; ?>

      <div class="comment-author">
          <?php if ($submitted): ?>
            <span class="date">
                <?php print render($created); ?>
            </span> | 
            <span class="user">
                <?php print str_replace(' (' . t('not verified') .')', '', $author); ?>
            </span>
          <?php endif; ?>

          <?php if ($comment->new) : ?>
            <span class="new"><?php print drupal_ucfirst($new) ?></span>
          <?php endif; ?>

          <?php if ($links): ?>
            <div class="links"><?php print render($links); ?></div>
          <?php endif; ?>
        </div>
    </div>
  </div>

</div>
