<?php
$title = get_post_meta($post->ID, '_igv_post_title', true);
$authors = get_post_meta($post->ID, '_igv_post_authors', true);
?>

<div class="grid-item no-gutter item-s-12 item-m-6 item-l-8 grid-row justify-center align-items-end">
  <div class="grid-item item-s-12 item-l-6 text-align-center">
    <div class="font-size-large">
      <?php
        echo !empty($title) ? '<em class="js-fix-widows">' . $title . '</em>' : '';
      ?>
    </div>
    <div><?php
      if (!empty($authors)) {
        foreach ($authors as $key => $value) {
          echo '<span>';
          echo $value;
          echo ($key + 1) < count($authors) ? ', ' : '';
          echo '</span>';
        }
      }
    ?></div>
  </div>
</div>

<article <?php post_class('grid-item no-gutter item-s-12 grid-row padding-top-basic'); ?> id="post-<?php the_ID(); ?>">
  <header class="u-visuallyhidden">
    <h1><?php the_title(); ?></h1>
  </header>

  <div class="grid-item item-s-12 item-l-8 offset-l-4">
    <?php the_content(); ?>
  </div>
</article>
