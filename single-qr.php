<?php
$post_id = get_the_id();
$url = get_post_meta($post_id, '_igv_qr_link', true);

if (!empty($url)) {
  header("Location: " . $url);
} else {
  header("Location: " . home_url());
}

die();
?>