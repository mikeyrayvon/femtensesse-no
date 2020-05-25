<section class="background-alabaster">
  <div id="query-row" class="container grid-row">
    <?php
    $args = array(
      'post_type' => array('post','project','note'),
      'posts_per_page' => -1,
      'post__not_in' => array($exclude_id),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('partials/query-' . get_post_type());
      }
    }

    wp_reset_postdata();
    ?>
  </div>
</section>
