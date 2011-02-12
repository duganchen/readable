<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
<!-- Still necessary, unfortunately. See:
http://core.trac.wordpress.org/ticket/10891
-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
<header>
<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>
<nav id="menu">
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>
</nav>
</header>
<div id="container">
<article class="column">
<?php if (have_posts()): ?>
	<?php while (have_posts()): ?>
		<?php the_post(); ?>
		<?php if (is_front_page() || is_archive()): ?>
			<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		<?php if (is_front_page() || is_archive()): ?>
			<time><?php the_time('Y-m-j'); ?></time>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php if (count(get_pages('child_of='.$post->ID)) > 0): ?>
			<h2>Sections Of Interest</h2>
			<ul>
			<?php wp_list_pages('title_li=&depth=1&child_of='.$post->ID); ?>
			</ul>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</article>
<nav id="sidebar" class="column">
<h1>News</h1>
<ul>
<?php wp_get_archives('title_li=0'); ?>
</ul>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>
</nav>
<footer>
<?php if (!is_front_page() && !is_archive()): ?>
	<p>
	Last revised on <?php the_date(); ?>.
	</p> 
<?php endif; ?>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
