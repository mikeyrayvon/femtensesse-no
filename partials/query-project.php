<?php
  $project_type = get_post_meta($post->ID, '_igv_project_type', true);
  get_template_part('partials/query-' . $project_type);
?>
