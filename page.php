<?php
get_header();

if (have_posts()) {
  while (have_posts()) {
    the_post();
?>
    <article>
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

get_footer();
?>
