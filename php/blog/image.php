<?php 
	require 'utils.php';
	$id = $_GET['id'];
	$post = get_post($id);
	if (empty($post['file_type'])) {
		$file_type = "image/png";
	} else {
		$file_type = $post['file_type'];
	}
	$content_type = "Conetent-Type: ${file_type}";
	header('Content-Type: image/jpg');
	readfile($post['image_path']);
 ?>