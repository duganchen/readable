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

					<?php if (is_search() || is_front_page()): ?>
						<?php get_search_form(); ?>
						<hr>
					<?php endif; ?>

					<?php if (have_posts()): ?>
						<?php while (have_posts()): ?>
							<?php the_post(); ?>

							<?php if (is_front_page() || is_archive() || is_search()): ?>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php endif; ?>

							<?php if (is_single()): ?>
								<h1><?php the_title(); ?></h1>
							<?php endif; ?>

							<?php if (is_front_page() || is_archive() || is_single() || is_search()): ?>
								<time><?php the_time('Y-m-j'); ?></time>

							<?php endif; ?>

							<?php if (is_front_page() || is_archive() || is_search()): ?>
								<?php the_excerpt(); ?>
							<?php else: ?>
								<?php the_content(); ?>
							<?php endif; ?>
							<?php if (count(get_pages('child_of='.$post->ID)) > 0): ?>
								<h2>Sections Of Interest</h2>
								<ul>
									<?php wp_list_pages('title_li=&depth=1&child_of='.$post->ID); ?>
								</ul>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php if (is_front_page() || is_search()): ?>
							<hr>
							<p>
								<?php posts_nav_link(); ?>
							</p>
						<?php endif; ?>
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
							By Dugan Chen (thed<a href="http://www.google.com/recaptcha/mailhide/d?k=01UUWk0_R0AAp7ZY7S8ep7Mw==&amp;c=kF269A4DQMn9Q_PuthJ-ipRjREHb5Hv09VuDHCUFM6s=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501UUWk0_R0AAp7ZY7S8ep7Mw\75\75\46c\75kF269A4DQMn9Q_PuthJ-ipRjREHb5Hv09VuDHCUFM6s\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">...</a>@gmail.com).
						</p>
					<?php else: ?>
						<p>
							Last revised on <?php the_date(); ?> by Dugan Chen (thed<a href="http://www.google.com/recaptcha/mailhide/d?k=01UUWk0_R0AAp7ZY7S8ep7Mw==&amp;c=kF269A4DQMn9Q_PuthJ-ipRjREHb5Hv09VuDHCUFM6s=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501UUWk0_R0AAp7ZY7S8ep7Mw\75\75\46c\75kF269A4DQMn9Q_PuthJ-ipRjREHb5Hv09VuDHCUFM6s\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">...</a>@gmail.com).
						</p>
					<?php endif; ?>


				</footer>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
