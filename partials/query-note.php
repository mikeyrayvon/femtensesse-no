<?php
  $note_link = get_post_meta($post->ID, '_igv_note_link', true);
?>

<article <?php post_class('query-item query-item-note grid-item item-s-8 item-m-4 item-l-3'); ?> id="post-<?php the_ID(); ?>">
  <div class="<?php echo !empty($note_link) ? 'note-link' : 'note-text'; ?>">
    <?php
      echo !empty($note_link) ? '<a href="' . $note_link . '" class="link-underline">' : '';
      the_content();
      echo !empty($note_link) ? '</a>' : '';
    ?>
  </div>
</article>
