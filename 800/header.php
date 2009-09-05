<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
        <meta http-equiv="Expires" content="Tue, 01 Jan 2000 12:12:12 GMT">
        <meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/800/fat.js"></script>
	<script type="text/javascript">
		function copy() {
		  	var flashcopier = 'flashcopier';
		  	if (!document.getElementById(flashcopier)) {
		    		var divholder = document.createElement('div');
		    		divholder.id = flashcopier;
		    		document.body.appendChild(divholder);
		  	}
		  	document.getElementById(flashcopier).innerHTML = '';
                        var xxx = document.getElementById('content').innerHTML.length <= 779 ? document.getElementById('content').innerHTML + ' (http://800kytu.com)' : document.getElementById('content').innerHTML;
		  	var divinfo = '<embed src="<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/800/_clipboard.swf" FlashVars="clipboard='+encodeURIComponent(xxx)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
		  	document.getElementById(flashcopier).innerHTML = divinfo;
			document.getElementById('doCopy').innerHTML = 'Đã copy vào clipboard';
			Fat.fade_element('doCopy', 30, 1500);
		}
	</script>
	<?php wp_head() ?>
	<title>800 ký tự :: <?php qa_post_count() ?> mẩu chuyện và vẫn tiếp tục tăng...</title>	
</head>
<body>