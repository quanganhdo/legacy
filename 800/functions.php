<?php

remove_filter('the_content', 'wpautop');

function qa_char_count() {
	echo number_format(mb_strlen(strip_tags(get_the_content())));
}

function qa_post_count() {
    global $wpdb;
    echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_date_gmt < '" . gmdate("Y-m-d H:i:s",time()) . "'");
}
?>