<?php
add_action( 'cmb2_admin_init', 'igv_register_theme_options_metabox' );

function igv_register_theme_options_metabox() {
  $prefix = '_igv_';

  // Site options for general data

  $site_options = new_cmb2_box( array(
    'id'           => $prefix . 'site_options_page',
    'title'        => esc_html__( 'Site Options', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    /*
     * The following parameters are specific to the options-page box
     * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
     */
    'option_key'      => $prefix . 'site_options', // The option key and admin menu page slug.
    // 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
    // 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
    'capability'      => 'manage_options', // Cap required to view options-page.
    // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
    // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
    // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
    // 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
  ) );

  // Social Media variables

  $site_options->add_field( array(
    'name'    => esc_html__( 'General', 'cmb2' ),
    'id'      => $prefix . 'generaloptions_title',
    'type'    => 'title',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Main Address', 'cmb2' ),
    'id'      => 'contact_address',
    'type'    => 'textarea_small',
    'default' => 'Waldemar Thranes gate 70
0173 Oslo'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Main Address', 'cmb2' ),
    'id'      => 'contact_map_link',
    'type'    => 'text',
    'default' => 'https://goo.gl/maps/TuJhUviTcxCaXq7LA'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Email', 'cmb2' ),
    'id'      => 'contact_email',
    'type'    => 'text',
    'default' => 'info@femtensesse.no'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Phone', 'cmb2' ),
    'id'      => 'contact_phone',
    'type'    => 'text',
    'default' => '+47 414 29 679'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Hours', 'cmb2' ),
    'id'      => 'contact_hours',
    'type'    => 'textarea_small',
    'default' => 'Wednesday – Saturday, 12:00 – 16:00
or by appointment'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Mailchimp Action', 'cmb2' ),
    'id'      => 'mailchimp_action',
    'type'    => 'text',
    'default' => 'https://femtensesse.us19.list-manage.com/subscribe/post?u=664b0804fdbd7f516b8fde26e&amp;id=005711035b'
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Social Media', 'cmb2' ),
    'desc'    => esc_html__( 'Urls and accounts for different social media platforms. For use in menus and metadata', 'cmb2' ),
    'id'      => $prefix . 'socialmedia_title',
    'type'    => 'title',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Facebook Page URL', 'cmb2' ),
    'id'      => 'socialmedia_facebook_url',
    'type'    => 'text',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Twitter Account Handle', 'cmb2' ),
    'id'      => 'socialmedia_twitter',
    'type'    => 'text',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Instagram Account Handle', 'cmb2' ),
    'id'      => 'insta',
    'type'    => 'text',
    'default' => 'femtensesse'
  ) );

  // Metadata optionsinsta

  $site_options->add_field( array(
    'name'    => esc_html__( 'Metadata options', 'cmb2' ),
    'desc'    => esc_html__( 'Settings relating to open graph, facebook and twitter sharing, and other social media metadata', 'cmb2' ),
    'id'      => $prefix . 'og_title',
    'type'    => 'title',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Open Graph default image', 'cmb2' ),
    'desc'    => esc_html__( 'primarily displayed on Facebook, but other locations as well', 'cmb2' ),
    'id'      => 'og_image',
    'type'    => 'file',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Logo for SEO results', 'cmb2' ),
    'desc'    => esc_html__( 'presentation logo for this site (optional)', 'cmb2' ),
    'id'      => 'metadata_logo',
    'type'    => 'file',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Facebook App ID', 'cmb2' ),
    'desc'    => esc_html__( '(optional)', 'cmb2' ),
    'id'      => 'og_fb_app_id',
    'type'    => 'text',
  ) );

  // Analytics

  $site_options->add_field( array(
    'name'    => esc_html__( 'Analytics', 'cmb2' ),
    'desc'    => esc_html__( 'Settings for analytics', 'cmb2' ),
    'id'      => $prefix . 'analytics_title',
    'type'    => 'title',
  ) );

  $site_options->add_field( array(
    'name'    => esc_html__( 'Google Analytics Tracking ID', 'cmb2' ),
    'desc'    => esc_html__( '(optional)', 'cmb2' ),
    'id'      => 'google_analytics_id',
    'type'    => 'text',
  ) );
}
