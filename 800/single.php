<?php get_header(); ?>
<div id="wrapper">		
	<?php the_post() ?>
	<div class="quote">
        <span class="quote">
            <big class="quote"><a href="<?php echo get_permalink() ?>">&#147;</a></big> <span id="content"><?php the_content() ?></span> <small><?php edit_post_link('sửa'); ?></small>		
        </span>
        <div class="source">&mdash; <?php qa_char_count() ?> ký tự &middot; <span id="doCopy"><a href="javascript:copy()">Copy gửi cho bạn bè</a></span> &middot; <a href="<?php echo get_option('home'); ?>">Xem truyện khác &raquo;</a></div>
    </div>
</div>
<?php get_footer() ?>