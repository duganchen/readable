<?php
add_action('init', 'readable_init');
function readable_init() {
	if (!is_admin()) {
		$src = get_template_directory_uri().'/js/jquery.lightbox.min.js';
		wp_register_script('lightbox', $src, array('jquery'), 0.5, true);
		wp_enqueue_script('lightbox');
		$src = get_template_directory_uri().'/js/readable.js';
		wp_register_script('readable', $src, array('lightbox'), null, true);
		wp_enqueue_script('readable');

	}
}

?>

