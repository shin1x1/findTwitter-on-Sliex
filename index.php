<?php
require_once __DIR__.'/silex.phar';

$app = new Silex\Application();

$app['findTwitter.twitter_url'] = 'http://search.twitter.com/search.json';
$app['findTwitter.lang'] = 'ja';
$app['findTwitter.count_pre_page'] = 20;

$app->get('/', function () use ($app) {
  $results = array();

  $query = $app['request']->get('q');
  $page = intval($app['request']->get('page')) ?: 1;
  $is_prev = false;
  $is_next = false;

  if (!empty($query)) {
    $array = array(
      'q' => $query,
      'rpp' => $app['findTwitter.count_pre_page'],
      'lang' => $app['findTwitter.lang'],
    );
    if ($page) {
      $array['page'] = $page;
    }
    $queryString = http_build_query($array);

    $ret = file_get_contents($app['findTwitter.twitter_url'].'?'.$queryString);
    if (!empty($ret)) {
      $obj = json_decode($ret);
      $is_prev = isset($obj->previous_page); 
      $is_next = isset($obj->next_page); 

      $results = $obj->results;
    }
  }

  ob_start();
  include __DIR__.'/views/index.php';
  return ob_get_clean();
});


// View Helper
function h($text) {
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

$app->run();
