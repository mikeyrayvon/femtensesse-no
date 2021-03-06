<?php
$images = get_post_meta($post->ID, '_igv_images', true);
if (!empty($images)) {
?>
<div id="overlay-gallery" class="grid-column justify-center align-items-center">
  <div class="swiper-container">
    <div class="swiper-wrapper">
    <?php
      foreach ($images as $id => $url) {
        $attachment = get_post($id);
        $caption = $attachment->post_excerpt;
        $more_info = $attachment->post_content;
        $zoom_src = wp_get_attachment_image_src($id, 'zoom')[0];
    ?>
      <div class="swiper-slide" data-image-id="<?php echo $id; ?>">
        <?php echo wp_get_attachment_image($id, 'gallery', false, array('data-no-lazysizes' => true, 'data-zoom-src' => $zoom_src, 'class' => 'toggle-zoom')); ?>
        <div class="slide-caption-holder">
          <div class="slide-caption">
            <span><?php echo !empty($caption) ? $caption : ''; ?></span>
            <?php if (!empty($more_info)) { ?>
              <span class="slide-caption-info-trigger text-underline u-pointer font-size-small">More info</span>
              <div class="slide-caption-info no-p-margin-bottom"><?php echo apply_filters('the_content', $more_info); ?></div>
            <?php } ?>
          </div>
        </div>
        <?php echo wp_get_attachment_image($id, 'zoom', false, array('data-no-lazysizes' => true, 'class' => 'slide-zoom-image toggle-zoom')); ?>
        <!--img src="" class="slide-zoom-image toggle-zoom"-->
      </div>
    <?php } ?>
    </div>
  </div>
  <div id="slide-controls" class="grid-row align-items-center justify-between <?php echo count($images) === 1 ? 'u-hidden' : ''; ?>">
    <div>
      <span class="slide-control slide-prev u-pointer">&lsaquo;</span>
    </div>
    <div>
      <span class="slide-control slide-next u-pointer">&rsaquo;</span>
    </div>
  </div>
  <div id="gallery-close" class="grid-row justify-end align-items-start"><span class="u-pointer toggle-overlay" role="button">&times;</span></div>
</div>
<?php
}
