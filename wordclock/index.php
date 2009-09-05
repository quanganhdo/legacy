<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Word Clock Clone</title>
		<script src="clock.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://quanganhdo.com/mint/?js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css" media="screen">
			body, .active {
				color: #FA5B0F;
				background-color: black;
				font-weight: bold;
				font-size: 16px;
				font-family: Verdana, Arial;
			}
			.inactive {
				color: #474747;
				font-weight: normal;
			}
			#clock {
				width: 820px;
				margin: 30px auto;
			}
		</style>
	</head>
	<body onload="start()">
		<div id="clock"></div>
	</body>
</html>