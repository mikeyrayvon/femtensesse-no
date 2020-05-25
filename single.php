<?php
get_header();

if (have_posts()) {
  while (have_posts()) {
    the_post();
    $top_id = $post->ID;
    get_template_part('partials/content-' . get_post_type());
  }
}
?>

  </div>
</section>

<?php

set_query_var( 'exclude_id', absint( $top_id ) );
set_query_var( 'is_top', false );
get_template_part('partials/query');

get_footer();
?>
