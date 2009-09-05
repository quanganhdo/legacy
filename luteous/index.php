<?php include 'loader.php' ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Luteous</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8">
		<script src="js/jquery-1.2.3.pack.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jQuery.frameReady.js" type="text/javascript" charset="utf-8"></script>		
		<script src="js/jquery.highlightFade.js" type="text/javascript" charset="utf-8"></script>		
		<script src="js/edit_area/edit_area_compressor.php?plugins" type="text/javascript" charset="utf-8"></script>		
		<script src="js/luteous.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://quanganhdo.com/mint/?js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!-- loading -->
		<div id="loadingBG"></div>
		<div id="loading">
			<p><img src="img/loading.gif" /></p>
			<p>Dữ liệu đang được tải xuống...</p> 
		</div>
		<!-- sidebar -->
		<div id="sidebar">			
			<div id="playground">
				<textarea id="editor">/* 
-------------------------------------
Luteous alpha
Copyright (c) 2008 QAD
http://quanganhdo.com
-------------------------------------
*/</textarea>
				<div id="extra">
					<p align="right">
						<a href="index.php">Sửa profile khác</a>
						<a href="javascript:Luteous.about()">Thông tin</a>
						<a href="javascript:Luteous.copy()">Copy vào clipboard</a>
						<input type="button" value="Xem thử &rarr;" onclick="javascript:Luteous.applyCSS(editAreaLoader.getValue('editor'))" />
					</p>
					<p id="confirm">Hãy bấm chọn khu vực bạn muốn sửa trong màn hình bên phải.</p>
				</div>
			</div>
		</div>
		<!-- profile -->
		<iframe id="profile" name="profile" src="profile.php?id=<?php echo htmlentities($_POST['id'], ENT_QUOTES) ?>" frameborder="no"> </iframe>
	</body>
</html>