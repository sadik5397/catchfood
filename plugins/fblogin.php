<?php
require_once __DIR__ . '/Facebook' . '/autoload.php';
//FACEBOOK
$fb = new Facebook\Facebook([
  'app_id' => FB_APP_ID,
  'app_secret' => FB_APP_SECRET,
  'default_graph_version' => 'v2.12',
]);
$redirect = SITE_URL.'/index.php?login&type=facebook';
# Create the login helper object
$helper = $fb->getRedirectLoginHelper();
$permissions  = ['email'];
$loginUrl = $helper->getLoginUrl($redirect,$permissions);
?>
