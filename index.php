<?
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: -1');
	header('Content-Type: text/html; charset=UTF-8');
	
	$template_url = get_bloginfo('template_url');
	
	$email = 'cruland@gmail.com';
	
  remove_filter('the_content',  'wpautop');
  
?><!doctype html>
<title><? bloginfo('name') ?></title>
<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta name=description content="<? bloginfo('description') ?>">
<meta content="<?= date('r', microtime(true)) ?>" name=DC.date.issued>
<link href="<?= $template_url ?>/style.css" rel=stylesheet>

<body>
<? 
  include 'contact_form.php';
	insert_page('page_id=5');
	insert_page('page_id=9');
	insert_page('page_id=11');
	insert_page('page_id=13');
	insert_page('page_id=15');
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?= $template_url ?>/jquery.placehold.min.js"></script>
<script src="<?= $template_url ?>/fit.js"></script>
<script>var _gaq=[['_setAccount','<?= $ga_UA ?>'],['_trackPageview']]</script>
<script src="//www.google-analytics.com/ga.js"></script>