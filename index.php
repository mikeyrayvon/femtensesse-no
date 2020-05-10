<?php
get_header();

$args = array(
  'post_type' => array('project'),
  'posts_per_page' => 1,
  'meta_key' => '_igv_project_type',
	'meta_value' => 'exhibition'
);

$top_query = new WP_Query($args);
$top_id = null;

if ($top_query->have_posts()) {
  while ($top_query->have_posts()) {
    $top_query->the_post();
    $top_id = $post->ID;
    set_query_var( 'is_top', true );
    get_template_part('partials/query-exhibition');
  }
}

wp_reset_postdata();

set_query_var( 'exclude_id', absint( $top_id ) );
set_query_var( 'is_top', false );
get_template_part('partials/query');

get_footer();
?>
