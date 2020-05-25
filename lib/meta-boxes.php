<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
*/

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
  */

  $post_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'post_metabox',
		'title'         => esc_html__( 'Post Options', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
	) );

  $post_metabox->add_field( array(
  	'name'    => 'Title',
  	'id'      => $prefix . 'post_title',
  	'type'    => 'text',
  ) );

  $post_metabox->add_field( array(
  	'name'    => 'Authors',
  	'id'      => $prefix . 'post_authors',
  	'type'    => 'text',
    'repeatable' => true
  ) );

  $project_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'project_metabox',
		'title'         => esc_html__( 'Project Options', 'cmb2' ),
		'object_types'  => array( 'project' ), // Post type
	) );

  $project_metabox->add_field( array(
  	'name'    => 'Title',
  	'id'      => $prefix . 'project_title',
  	'type'    => 'text',
  ) );

  $project_metabox->add_field( array(
    'name'    => 'Type',
  	'id'      => $prefix . 'project_type',
  	'type'    => 'radio_inline',
  	'options' => array(
  		'exhibition' => __( 'Exhibition', 'cmb2' ),
  		'artfair'   => __( 'Art Fair', 'cmb2' ),
  	),
  	'default' => 'exhibition',
  ) );

  $project_metabox->add_field( array(
    'name'    => 'Solo',
    'desc'    => 'if True, project Title is listed after Artist names',
  	'id'      => $prefix . 'project_solo',
  	'type'    => 'radio_inline',
  	'options' => array(
  		true => __( 'True', 'cmb2' ),
  		false   => __( 'False', 'cmb2' ),
  	),
  	'default' => true,
  ) );

  $project_metabox->add_field( array(
  	'name'    => 'Artists',
  	'id'      => $prefix . 'project_artists',
  	'type'    => 'text',
    'repeatable' => true
  ) );

  $project_metabox->add_field( array(
  	'name'    => 'Start Date',
  	'id'      => $prefix . 'project_start',
  	'type'    => 'text_date_timestamp',
  ) );

  $project_metabox->add_field( array(
  	'name'    => 'End Date',
  	'id'      => $prefix . 'project_end',
  	'type'    => 'text_date_timestamp',
  ) );

  $project_metabox->add_field( array(
  	'name'    => 'Location',
    'desc'    => 'Address, space, or city (for art fair)',
  	'id'      => $prefix . 'project_location',
  	'type'    => 'textarea_small',
    'default' => 'Waldemar Thranes gate 70
0173 Oslo'
  ) );

  $project_metabox->add_field( array(
  	'name'    => 'Fair',
    'desc'    => 'Art fair only',
  	'id'      => $prefix . 'project_fair',
  	'type'    => 'text',
  ) );

  $project_metabox->add_field( array(
    'name'    => 'Image Gallery',
		'id'           => $prefix . 'images',
		'type'         => 'file_list',
		'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
    'show_on_cb'    => 'igv_exclude_field',
	) );

  $note_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'note_metabox',
		'title'         => esc_html__( 'Note Options', 'cmb2' ),
		'object_types'  => array( 'note' ), // Post type
	) );

  $note_metabox->add_field( array(
  	'name'    => 'Note Link',
  	'id'      => $prefix . 'note_link',
  	'type'    => 'text',
  ) );

}
?>
