<?php
$solo = get_post_meta($post->ID, '_igv_project_solo', true);
$artists = get_post_meta($post->ID, '_igv_project_artists', true);
$location = get_post_meta($post->ID, '_igv_project_location', true);
$fair = get_post_meta($post->ID, '_igv_project_fair', true);
$disable_link = get_post_meta($post->ID, '_igv_project_disable_link', true);
?>

<article <?php post_class('query-item grid-item item-s-12 item-m-4 item-l-3'); ?> id="post-<?php the_ID(); ?>">
  <div class="<?php echo $is_top ? 'grid-item item-s-auto': ''; ?>">
    <?php if (empty($disable_link)) { ?><a href="<?php the_permalink(); ?>"><?php } ?>
      <h3 class="font-size-mid">
        <?php
          echo !$solo ? '<div><em class="js-fix-widows">' . get_the_title() . '</em></div>' : '';
          foreach ($artists as $artist) {
            echo '<div><span class="js-fix-widows">' . $artist . '</span></div>';
          }
          echo $solo ? '<div><em class="js-fix-widows">' . get_the_title() . '</em></div>' : '';
          echo !empty($fair) ? '<div><span>at ' . $fair . '</span></div>' : '';
        ?>
      </h3>
      <?php igv_project_dates($post->ID);?>
      <?php echo !empty($location) ? '<div class="no-p-margin-bottom">' . apply_filters('the_content', $location) . '</div>' : ''; ?>
    <?php if (empty($disable_link)) { ?></a><?php } ?>
  </div>
</article>
