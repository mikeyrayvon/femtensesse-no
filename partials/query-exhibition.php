<?php
$title = get_post_meta($post->ID, '_igv_project_title', true);
$solo = get_post_meta($post->ID, '_igv_project_solo', true);
$artists = get_post_meta($post->ID, '_igv_project_artists', true);
$location = get_post_meta($post->ID, '_igv_project_location', true);
$disable_link = get_post_meta($post->ID, '_igv_project_disable_link', true);

$item_classes = $is_top ? 'item-l-8 grid-row no-gutter query-item-top' : 'item-m-6 item-l-4';
?>

<article <?php post_class('query-item grid-item item-s-12 ' . $item_classes); ?> id="post-<?php the_ID(); ?>">

  <?php if ($is_top) { ?>
  <div id="top-thumb-holder" class="grid-item item-s-12 item-m-6 item-l-auto">
    <?php if (empty($disable_link)) { ?><a href="<?php the_permalink(); ?>"><?php } ?>
      <?php the_post_thumbnail('full'); ?>
    <?php if (empty($disable_link)) { ?></a><?php } ?>
  </div>
  <?php } ?>

  <div class="<?php echo $is_top ? 'grid-item item-s-12 item-m-6 item-l-auto': ''; ?>">
    <?php if (empty($disable_link)) { ?><a href="<?php the_permalink(); ?>"><?php } ?>
      <h3 class="font-size-large">
        <?php
          echo !$solo && !empty($title) ? '<div><em class="js-fix-widows">' . $title . '</em></div>' : '';
          foreach ($artists as $artist) {
            echo '<div><span class="js-fix-widows">' . $artist . '</span></div>';
          }
          echo $solo && !empty($title) ? '<div><em class="js-fix-widows">' . $title . '</em></div>' : '';
        ?>
      </h3>
      <?php igv_project_dates($post->ID);?>
      <?php echo !empty($location) ? '<div class="no-p-margin-bottom">' . apply_filters('the_content', $location) . '</div>' : ''; ?>
    <?php if (empty($disable_link)) { ?></a><?php } ?>
  </div>
</article>
