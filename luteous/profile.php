<?php
// Mash has closed, so we use local version of vnteam_360plus
// $prefix = $_SERVER['SERVER_NAME'] == 'localhost' ? '' : 'http://vn.myblog.yahoo.com/';
// $id = isset($_GET['id']) ? htmlentities($_GET['id'], ENT_QUOTES) : 'vnteam_360plus';
// echo file_get_contents($prefix.$id);                      

echo file_get_contents('vnteam_360plus');
?>