<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
--> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>findTwitter</title> 
<meta name="keywords" content="" /> 
<meta name="description" content="" /> 
<link href="/css/default.css" rel="stylesheet" type="text/css" /> 
</head> 
<body> 
<div id="container"> 
  <div id="header"> 
    <h1><a href="/">findTwitter</a></h1> 
  </div> 
  <div id="content"> 
    <div id="search" class="search"> 
      <form id="IndexForm" method="get" action="">
      $app->get(
      <input type="text" name="q" value="<?php echo h($query) ?>" class="input_q" size="12" /> 
      <input type="submit" value="search" />
        );
      </form>
    </div> 
 
  <?php if (!empty($results)) : ?>
    <div class="autopagerize_page_element">
    <?php foreach ($results as $v): ?>
      <div class="post">
        <h3><a href="http://twitter.com/<?php echo h($v->from_user) ?>"><?php echo h($v->from_user) ?></a></h3>
        <p>
          <img src="<?php echo $v->profile_image_url; ?>" width="48" height="48" class="img1" />
          <?php echo $v->text; ?>
        </p>
        <p class="file">
          <small>
          Posted at <?php echo date('Y/m/d H:i:s', strtotime($v->created_at)) ?> | 
          <a href="http://twitter.com/<?php echo h($v->from_user) ?>/status/<?php echo h($v->id_str) ?>">permlink</a> | 
          <?php echo html_entity_decode($v->source) ?>
          </small>
        </p>
      </div>
    <?php endforeach; ?>
    </div> 
  <?php endif; ?>

    <div class="pager"> 
      <?php if ($is_prev): ?>
      <a href="/?q=<?php echo h($query) ?>&page=<?php echo $page - 1 ?>" rel="prev" class="prev">&lt;&lt; prev</a>&nbsp;
      <?php endif; ?>
      &nbsp;
      <?php if ($is_next): ?>
      <a href="/?q=<?php echo h($query) ?>&page=<?php echo $page +1 ?>" rel="next" class="next">next &gt;&gt;</a>&nbsp;
      <?php endif; ?>
    </div> 

  </div> 
  <div style="clear: both;">&nbsp;</div> 
</div> 
<div id="footer"> 
  <p> 
    | <a href="http://www.1x1.jp/blog/" target="_blank">blog</a> | <a href="http://twitter.com/shin1x1" target="_blank">Twitter</a> | <a href="http://github.com/shin1x1/findTwitter/tree/master" target="_blank">github</a> |<br /> 
    Copyright &copy; 2011 findTwitter on Silex. <br /> 
    Designed by <a href="http://www.freecsstemplates.org"><strong>Free CSS Templates</strong></a> 
  </p> 
</div> 
</body> 
</html> 
