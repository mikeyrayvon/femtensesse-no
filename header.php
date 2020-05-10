<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<?php
$options = get_site_option('_igv_site_options');
?>

<section id="main-container">
  <main class="container grid-row padding-top-basic">
    <header id="header" class="grid-item item-s-12 item-m-6 item-l-4">
      <h1 class="font-size-large"><a href="<?php echo home_url(); ?>"><em><?php bloginfo('name'); ?></em></a></h1>
      <div class="font-size-mid">
        <div>
        <?php
          if (!empty($options['contact_address'])) {
            echo !empty($options['contact_map_link']) ? '<a href="' . $options['contact_map_link'] . '">' : '';
            echo '<span class="no-p-margin-bottom">' . apply_filters('the_content', $options['contact_address']) . '</span>';
            echo !empty($options['contact_map_link']) ? '</a>' : '';
          }
        ?>
        </div>
        <div>
        <?php
          echo !empty($options['contact_phone']) ? '<a href="tel:' . str_replace(' ', '', $options['contact_phone']) . '">' . $options['contact_phone'] . '</a>' : '';
        ?>
        </div>
        <div>
        <?php
          echo !empty($options['contact_email']) ? '<a href="mailto:' . str_replace(' ', '', $options['contact_email']) . '">' . $options['contact_email'] . '</a>' : '';
        ?>
        </div>
      </div>
      <?php
        $info_page = get_page_by_path('info');
        if ($info_page) {
      ?>
      <div class="margin-top-tiny">
        <a href="<?php echo get_permalink($info_page); ?>">General Information and Mailing List</a>
      </div>
      <?php
        }
      ?>
      </div>
    </header>
