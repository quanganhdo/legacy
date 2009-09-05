<?php get_header(); ?>
<div id="wrapper">
	<?php if (isset($_GET['why'])): ?>
		<div class="quote">
			<span class="quote">
	            <big class="quote">&#147;</big> <span id="content"><a href="<?php echo get_option('home'); ?>">800 ký tự</a> là gì?</span>
				<ul>
					<li>Là tên trang web bạn đang truy cập</li>
					<li>Là tập hợp các mẩu chuyện, các bài thơ ngắn, vui được sưu tầm từ nhiều nguồn khác nhau</li>
					<li>Là nơi giúp bạn tiêu bớt thời gian rỗi rãi của mình</li>
				</ul>
				Tại sao lại là <a href="<?php echo get_option('home'); ?>">800 ký tự</a>?
				<p>800 ký tự là giới hạn độ dài một tin nhắn bạn có thể gửi qua Yahoo! Messenger. Một trong những tính năng của <a href="<?php echo get_option('home'); ?>">800 ký tự</a> là "Copy gửi cho bạn bè", do đó tất cả các mẩu chuyện mà bạn có thể đọc được tại đây đều có độ dài tối đa là 800 ký tự.</p>
				Mọi thứ chỉ đơn giản là vậy. <a href="<?php echo get_option('home'); ?>">Xem truyện tiếp thôi...</a>
	        </span>
		</div>
	<?php else: ?>
		<?php $query = isset($_GET['lastest']) ? 'showposts=1' : 'showposts=1&orderby=rand' ?>
		<?php query_posts($query) ?>			
		<?php the_post() ?>
		<div class="quote">
	        <span class="quote">
	            <big class="quote"><a href="<?php echo get_permalink() ?>">&#147;</a></big> <span id="content"><?php the_content() ?></span> <small><?php edit_post_link('sửa'); ?></small>		
	        </span>
	        <div class="source">&mdash; <?php qa_char_count() ?> ký tự &middot; <span id="doCopy"><a href="javascript:copy()">Copy gửi cho bạn bè</a></span> &middot; <a href="<?php echo get_option('home'); ?>">Xem truyện khác &raquo;</a></div>
	    </div>
	<?php endif ?>
</div>
<?php get_footer() ?>