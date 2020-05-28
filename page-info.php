<?php
get_header();

$options = get_site_option('_igv_site_options');

if (have_posts()) {
  while (have_posts()) {
    the_post();
?>
    <div class="info-section grid-item item-s-12 mobile-only font-size-mid text-align-center">
      <div>
      <?php
        if (!empty($options['contact_address'])) {
          echo !empty($options['contact_map_link']) ? '<a href="' . $options['contact_map_link'] . '">' : '';
          echo '<span class="no-p-margin-bottom">' . apply_filters('the_content', $options['contact_address']) . '</span>';
          echo !empty($options['contact_map_link']) ? '</a>' : '';
        }
      ?>
      </div>
      <div>
      <?php
        echo !empty($options['contact_phone']) ? '<a href="tel:' . str_replace(' ', '', $options['contact_phone']) . '">' . $options['contact_phone'] . '</a>' : '';
      ?>
      </div>
      <div>
      <?php
        echo !empty($options['contact_email']) ? '<a href="mailto:' . str_replace(' ', '', $options['contact_email']) . '">' . $options['contact_email'] . '</a>' : '';
      ?>
      </div>
    </div>
    <div id="mailchimp-holder" class="grid-item no-gutter item-s-12 item-m-6 item-l-8 grid-row">
      <?php if (!empty($options['mailchimp_action'])) { ?>
      <div class="grid-item item-s-12 margin-bottom-tiny">
        <span class="font-size-mid">Sign up for our mailing list</span>
      </div>

      <form novalidate="true" id="mailchimp-form" class="item-s-12 item-l-9 no-gutter grid-row">
        <div class="grid-item item-s-6 margin-bottom-tiny">
          <input type="name" name="FNAME" placeholder="First Name" class="mailchimp-field font-serif font-size-mid">
        </div>
        <div class="grid-item item-s-6 margin-bottom-tiny">
          <input type="name" name="LNAME" placeholder="Last Name" class="mailchimp-field font-serif font-size-mid">
        </div>
        <div class="grid-item item-s-12 item-l-8 margin-bottom-tiny">
          <input type="email" name="EMAIL" placeholder="Email" id="mailchimp-email" class="mailchimp-field font-serif font-size-mid">
        </div>
        <div class="grid-item item-s-12 item-l-4 margin-bottom-tiny">
          <button type="submit" id="mailchimp-submit" class="font-serif font-size-mid">Subscribe</button>
        </div>
      </form>
      <div id="mailchimp-response" class="grid-item item-s-12 item-l-9 margin-top-micro font-size-small">&nbsp;</div>
      <?php } ?>
    </div>

    <article <?php post_class('single-info grid-item no-gutter item-s-12 grid-row no-gutter'); ?> id="post-<?php the_ID(); ?>">
      <div class="info-section grid-item item-s-5 item-m-4 item-l-3 offset-l-1">
        <?php the_post_thumbnail('medium-large'); ?>
      </div>
      <div class="info-section grid-item item-s-12 item-m-8 item-l-5 font-size-mid">
        <?php the_content(); ?>
      </div>
      <div class="info-section grid-item item-s-7 item-m-4 offset-m-4 item-l-3 offset-l-0">
        <div><span>Office Hours</span></div>
        <?php if (!empty($options['contact_hours'])) { ?>
        <div class="no-p-margin-bottom">
          <?php echo apply_filters('the_content', $options['contact_hours']); ?>
        </div>
        <?php
        }
        if (!empty($options['socialmedia_instagram'])) {
        ?>
        <div class="margin-top-micro"><span>Please follow our <a href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>" class="link-underline">Instagram</a></span></div>
        <?php } ?>
      </div>
    </article>

<?php
  }
}
?>

  </div>
</section>

<?php

set_query_var( 'exclude_id', null );
set_query_var( 'is_top', false );
get_template_part('partials/query');

?>

<section class="background-alabaster">
  <div class="container grid-row">
    <div class="grid-item item-s-12 padding-bottom-tiny font-size-small">
      <span>Website by <a href="https://interglobal.vision" class="link-underline">Interglobal Vision</a></span>
    </div>
  </div>
</section>
<?php

get_footer();
?>
