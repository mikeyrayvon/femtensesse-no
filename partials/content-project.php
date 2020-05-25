<?php
$project_type = get_post_meta($post->ID, '_igv_project_type', true);
$title = get_post_meta($post->ID, '_igv_project_title', true);
$solo = get_post_meta($post->ID, '_igv_project_solo', true);
$artists = get_post_meta($post->ID, '_igv_project_artists', true);
$location = get_post_meta($post->ID, '_igv_project_location', true);
$fair = get_post_meta($post->ID, '_igv_project_fair', true);
$images = get_post_meta($post->ID, '_igv_images', true);
?>

<div id="single-header" class="single-header-project grid-item no-gutter item-s-12 item-m-6 item-l-8 grid-row justify-end">
  <div class="grid-item item-s-12 item-l-6">
    <div class="font-size-large">
      <?php
        echo !$solo && !empty($title) ? '<div><em class="js-fix-widows">' . $title . '</em></div>' : '';
        foreach ($artists as $artist) {
          echo '<div><span class="js-fix-widows">' . $artist . '</span></div>';
        }
        echo $solo && !empty($title) ? '<div><em class="js-fix-widows">' . $title . '</em></div>' : '';
        echo $project_type === 'artfair' && !empty($fair) ? '<div class="font-size-mid"><span>at ' . $fair . '</span></div>' : '';
      ?>
    </div>
    <?php igv_project_dates($post->ID);?>
    <?php echo !empty($location) ? '<div class="no-p-margin-bottom">' . apply_filters('the_content', $location) . '</div>' : ''; ?>
  </div>
</div>

<article <?php post_class('grid-item no-gutter item-s-12 grid-row'); ?> id="post-<?php the_ID(); ?>">
  <header class="u-visuallyhidden">
    <h1><?php the_title(); ?></h1>
  </header>

  <div id="project-gallery-holder" class="grid-item item-s-12 item-m-6 item-l-8 grid-row no-gutter">
    <?php
      if (empty($images)) {
        echo '&nbsp;';
      } else {
        foreach ($images as $id => $url) {
    ?>
      <div class="gallery-thumb-holder grid-item item-s-4 item-m-6 margin-bottom-small">
        <?php echo wp_get_attachment_image($id, 'full', false, array('class' => 'toggle-overlay u-pointer gallery-thumb', 'data-id' => $id)); ?>
      </div>
    <?php
        }
      }
    ?>
  </div>

  <div id="project-content-holder" class="grid-item item-s-12 item-m-6 item-l-4">
    <?php the_content(); ?>
  </div>

  <?php get_template_part('partials/overlay-gallery'); ?>

</article>
