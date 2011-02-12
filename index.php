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
			<time><?php the_time('Y-m-j'); ?></time>
		<?php else: ?>
			<h1><?php
				// Pages should have a custom field: "title"
				echo get_post_meta($post->ID, 'title', true);
			?></h1>
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
<?php
	// Change this part if you're using this theme yourself, of course.
?>
<?php if (is_front_page() || is_archive()): ?>
	<p>
	By Dugan Chen (duga<a
	href="http://www.google.com/recaptcha/mailhide/d?k=01e855LS0KvLv6fhvucTaeFg==&amp;c=OfRhaUuz5XiDdhrjW44i08EpyOpA_0RJcPvBIqe1a24=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501e855LS0KvLv6fhvucTaeFg\75\75\46c\75OfRhaUuz5XiDdhrjW44i08EpyOpA_0RJcPvBIqe1a24\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">...</a>@fastmail.fm)).
	</p>
<?php else: ?>
	<p>
	Last revised on <?php the_date(); ?> by Dugan Chen (duga<a
	href="http://www.google.com/recaptcha/mailhide/d?k=01e855LS0KvLv6fhvucTaeFg==&amp;c=OfRhaUuz5XiDdhrjW44i08EpyOpA_0RJcPvBIqe1a24=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501e855LS0KvLv6fhvucTaeFg\75\75\46c\75OfRhaUuz5XiDdhrjW44i08EpyOpA_0RJcPvBIqe1a24\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">...</a>@fastmail.fm).
	</p> 
<?php endif; ?>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
