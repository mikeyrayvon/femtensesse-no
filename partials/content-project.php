<div class="grid-item no-gutter item-s-12 item-m-6 item-l-8 grid-row justify-end">
  <div class="grid-item item-s-12 item-l-6">
    <div>
      <span class="font-size-large">Artist Name</span>
    </div>
    <div>
      <span class="font-size-large"><em>Exhibition Title</em></span>
    </div>
    <div>
      <span>Dates</span>
    </div>
    <div>
      <span>Address</span>
    </div>
  </div>
</div>

<article <?php post_class('grid-item no-gutter item-s-12 grid-row'); ?> id="post-<?php the_ID(); ?>">
  <header class="u-visuallyhidden">
    <h1><?php the_title(); ?></h1>
  </header>

  <div class="grid-item item-s-12 item-m-8">
    &nbsp;
  </div>

  <div class="grid-item item-s-12 item-m-4">
    <?php the_content(); ?>
  </div>

</article>
