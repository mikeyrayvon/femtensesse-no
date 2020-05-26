<?php

// Custom hooks (like excerpt length etc)

// Programatically create pages
function create_custom_pages() {
  $custom_pages = array(
    'home' => 'Home',
    'info' => 'Info',
  );
  foreach($custom_pages as $page_name => $page_title) {
    $page = get_page_by_path($page_name);
    if( empty($page) ) {
      wp_insert_post( array(
        'post_type' => 'page',
        'post_title' => $page_title,
        'post_name' => $page_name,
        'post_status' => 'publish'
      ));
    }
  }
}
add_filter( 'after_setup_theme', 'create_custom_pages' );

add_action( 'after_setup_theme', 'igv_setup' );
function igv_setup() {
  add_theme_support( 'align-wide' );
}

add_filter( 'allowed_block_types', 'igv_allow_core_blocks' );
function igv_allow_core_blocks( $allowed_block_types ) {

  $allowed_blocks = array(
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/audio',
    'core/image',
    'core/quote',
    'core/pullquote',
    'core-embed/youtube',
    'core-embed/vimeo',
    'core-embed/soundcloud',
    'core/video'
  );

  if( $post->post_type === 'project' ) {
		$allowed_blocks = array(
      'core/paragraph',
      'core/heading',
      'core/list',
      'core/audio',
      'core/image',
      'core/quote',
      'core/pullquote',
      'core-embed/youtube',
      'core-embed/vimeo',
      'core-embed/soundcloud',
      'core/video'
    );
	};

  if( $post->post_type === 'note' ) {
		$allowed_blocks = array(
      'core/paragraph',
      'core/list',
      'core/audio',
    );
	};

	return $allowed_blocks;
}
