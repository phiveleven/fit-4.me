<?php
/**
* Logging console
*/
function console(){
	$args = json_encode(func_get_args());
	echo "
  <script>console.log($args)</script>";
}

/**
 * Wrap a page within a section with header and footer.
 */
function insert_page($query){
	query_posts($query);
	while(have_posts()){ the_post();
	  global $post;
	  $name = $post->post_name; ?>
<section id=<?= $name ?>><a name=<?= $name ?>></a>
<? include('header-section.php') ?>

<h1><?= $post->post_title ?></h1>
<?= $post->post_content ?>
<? include('footer-section.php') ?>

</section>
	<? }
}