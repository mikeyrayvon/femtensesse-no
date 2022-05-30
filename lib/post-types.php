<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts .dashicons-admin-post:before {
    content: '\f123';
}

#menu-posts-project .dashicons-admin-post:before {
    content: '\f128';
}

#menu-posts-note .dashicons-admin-post:before {
    content: '\f157';
}

#menu-posts-qr .dashicons-admin-post:before {
      content: '\f11f';
  }
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Project
add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

  $labels = array(
    'name' => _x( 'Projects', 'project' ),
    'singular_name' => _x( 'Project', 'project' ),
    'add_new' => _x( 'Add New', 'project' ),
    'add_new_item' => _x( 'Add New Project', 'project' ),
    'edit_item' => _x( 'Edit Project', 'project' ),
    'new_item' => _x( 'New Project', 'project' ),
    'view_item' => _x( 'View Project', 'project' ),
    'search_items' => _x( 'Search Projects', 'project' ),
    'not_found' => _x( 'No projects found', 'project' ),
    'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Project:', 'project' ),
    'menu_name' => _x( 'Projects', 'project' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post',

    'show_in_rest'        => true,
    /*'template'          => array(
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some List' ) ),
      array( 'core/list' ),
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some Text' ) ),
      array( 'core/paragraph' )
    ),*/
		//'template_lock'     => 'all',
  );

  register_post_type( 'project', $args );
}

// Note
add_action( 'init', 'register_cpt_note' );

function register_cpt_note() {

  $labels = array(
    'name' => _x( 'Notes', 'note' ),
    'singular_name' => _x( 'Note', 'note' ),
    'add_new' => _x( 'Add New', 'note' ),
    'add_new_item' => _x( 'Add New Note', 'note' ),
    'edit_item' => _x( 'Edit Note', 'note' ),
    'new_item' => _x( 'New Note', 'note' ),
    'view_item' => _x( 'View Note', 'note' ),
    'search_items' => _x( 'Search Notes', 'note' ),
    'not_found' => _x( 'No notes found', 'note' ),
    'not_found_in_trash' => _x( 'No notes found in Trash', 'note' ),
    'parent_item_colon' => _x( 'Parent Note:', 'note' ),
    'menu_name' => _x( 'Notes', 'note' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post',

    'show_in_rest'        => true,
    /*'template'          => array(
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some List' ) ),
      array( 'core/list' ),
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some Text' ) ),
      array( 'core/paragraph' )
    ),*/
		//'template_lock'     => 'all',
  );

  register_post_type( 'note', $args );
}

// QR
add_action( 'init', 'register_cpt_qr' );

function register_cpt_qr() {

  $labels = array(
    'name' => _x( 'QR Codes', 'qr' ),
    'singular_name' => _x( 'QR Code', 'qr' ),
    'add_new' => _x( 'Add New', 'qr' ),
    'add_new_item' => _x( 'Add New QR Code', 'qr' ),
    'edit_item' => _x( 'Edit QR Code', 'qr' ),
    'new_item' => _x( 'New QR Code', 'qr' ),
    'view_item' => _x( 'View QR Code', 'qr' ),
    'search_items' => _x( 'Search QR Codes', 'qr' ),
    'not_found' => _x( 'No QR Code found', 'qr' ),
    'not_found_in_trash' => _x( 'No QR Codes found in Trash', 'qr' ),
    'parent_item_colon' => _x( 'Parent QR Code:', 'qr' ),
    'menu_name' => _x( 'QR Codes', 'qr' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post',

    'show_in_rest'        => true,
    /*'template'          => array(
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some List' ) ),
      array( 'core/list' ),
      array( 'core/heading', array(
        'level' => '5', 'content' => 'Some Text' ) ),
      array( 'core/paragraph' )
    ),*/
    //'template_lock'     => 'all',
  );

  register_post_type( 'qr', $args );
}
