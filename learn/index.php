<?php
function random_thing() {
	mt_srand ((double) microtime() * 1000000);
	$lines = file('hippo.txt');
	$rand = mt_rand(0,sizeof($lines)-1);
	return array(
		'thing' => strtolower(str_replace(array('-', '/'), ' ', urldecode($lines[$rand]))),
		'url' => 'http://www.wikihow.com' . $lines[$rand]
	);
}

$what_to_learn = random_thing();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Learn something new today</title>
		<script src="http://quanganhdo.com/mint/?js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css" media="screen">
			body {
				text-align: center;
				font-family: Arial, Verdana;
				font-size: 64%;
			}
			div {
				padding-top: 150px;
				font-size: 3em;
				line-height: 1.4;
			}
			a {
				color: #0080FF;
				text-decoration: none;
			}
			a:hover {
				border: 3px solid #0080FF;
				background: #0080FF;
				color: #FFFFFF;
			}
		</style>
	</head>
	<body>
		<div>
			Do you want to learn how to <?php echo $what_to_learn['thing'] ?>?<br />
			<a href="<?php echo $what_to_learn['url'] ?>">Yes</a> / <a href="javascript:document.location.reload()">No</a> / <a href="javascript:document.location.reload()">Who cares?</a>
		</div>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-6661691-6");
		pageTracker._trackPageview();
		} catch(err) {}</script>
		<script type="text/javascript" src="http://cetrk.com/pages/scripts/0002/4438.js"> </script>
	</body>
</html>

