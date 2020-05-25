<?php
$title = get_post_meta($post->ID, '_igv_post_title', true);
$authors = get_post_meta($post->ID, '_igv_post_authors', true);
?>

<div id="single-header" class="grid-item item-s-12 item-m-6 grid-row align-items-end justify-center margin-bottom-small">
  <div class="text-align-center">
    <div class="font-size-extra">
      <?php
        echo !empty($title) ? '<em class="js-fix-widows">' . $title . '</em>' : '';
      ?>
    </div>
    <div id="single-post-ornament-holder"><span class="ornament">2</span></div>
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

<article <?php post_class('single-post grid-item no-gutter item-s-12 grid-row'); ?> id="post-<?php the_ID(); ?>">
  <header class="u-visuallyhidden">
    <h1><?php the_title(); ?></h1>
  </header>

  <div class="grid-item no-gutter item-s-12 item-l-10 offset-l-2">
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="grid-item item-s-12 text-align-right">
    <?php the_date('j F Y'); ?>
  </div>
</article>
