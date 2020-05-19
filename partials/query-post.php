<?php
$title = get_post_meta($post->ID, '_igv_post_title', true);
$authors = get_post_meta($post->ID, '_igv_post_authors', true);
?>

<article <?php post_class('grid-item item-s-6 item-m-4 item-l-3 text-align-center'); ?> id="post-<?php the_ID(); ?>">
  <a href="<?php the_permalink(); ?>">
    <h3 class="font-size-mid"><em><?php echo !empty($title) ? $title : ''; ?></em></h3>
    <div><span class="ornament">2</span></div>
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
  </a>
</article>
