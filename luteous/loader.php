<?php if (!isset($_POST['go'])): ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Luteous</title>
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
			}
			input[type="text"] {
				border: 1px solid #CCCCCC;
				color: #CCCCCC;
				font-size: 1em;
				padding: 4px 6px;
			}
			input[type="submit"] {
				display: none;
			}
			a {
				color: #0080FF;
			}
		</style>
		<script type="text/javascript" charset="utf-8">
			function r() {
				document.getElementById('id').select();
				document.getElementById('id').style.color = 'black';
			}
		</script>
	</head>
	<body>
		<div>
			<form method="POST" name="luteous">
				http://vn.myblog.yahoo.com/
				<input type="text" id="id" name="id" value="quanganhdo" onclick="javascript:r()" />				
				<input type="submit" name="go" value="submit" />
			</form>
		</div>
	</body>
</html>
<?php die() ?>
<?php endif ?>