<?php 
	$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function get_offset() {
	$offset = 0;
	if (isset($_GET['offset']) and !empty($_GET['offset'])) {
		$offset = $_GET['offset'];
	}
	return $offset;
}

function get_db() {
	$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
}
function get_posts_count() {
	$st_count = get_db()->query("select count(*) as count from posts");
	$row = $st_count->fetch();
	$count = $row['count'];
	return $count;
}
function get_prev_offset($limit){
	$prev_offset = get_offset() - $limit;
	if ($prev_offset <= 0) {
		$prev_offset = 0;
	}
	return $prev_offset;
}
function get_next_offset($limit){
	$next_offset = get_offset() + $limit;
	return $next_offset;
}
function get_post($id){
	$st = get_db()->query("select * from posts where id = ${id}");
	$post = $st->fetch();
	return $post;
}
function is_exist($id) {
	return get_post($id);
}
function is_empty($arr,$key){
	if (isset($arr[$key])) {
		$str = trim($arr[$key]);
		if (empty($str)){
			return true;
		}
	} else {
		return true;
	}
	return false;
}
function is_edit($arr,$key){
	if (isset($arr[$key]) and $arr[$key] == 'edit') {
		return true;
	}
	return false;
}
function update_post($id,$title,$contents,$image){
	$path = "uploads/${id}";
	@mkdir($path, 0777, true);
	$image_name = $image['name'];
	$image_path ="${path}/${image_name}";
	$file_type = $image['type'];
	move_uploaded_file($image['tmp_name'], $image_path);
	$sql = "update posts set title = ?, contents = ?, image_name = ?, image_path = ?, file_type = ?, updated = current_timestamp where id = ?";
	$params = array($title, $contents, $image_name, $image_path, $file_type, $id);
	$st = get_db()->prepare($sql);
	$success = $st->execute($params);
	return $success;
}

function create_post($title,$contents,$image) {
	$sql = "insert into posts (title, contents, created, updated)
		value (?, ?, current_timestamp, current_timestamp)
	";
	$params = array($title, $contents);
	$db = get_db();
	$st = $db->prepare($sql);
	$success = $st->execute($params);
	$id = $db->lastInsertId();
	$path = "uploads/${id}";
	mkdir($path, 0777, true);
	$image_name = $image['name'];
	$image_path ="${path}/${image_name}";
	$file_type = $image['type'];
	move_uploaded_file($image['tmp_name'], $image_path);
	$sql = "update posts set image_name = ?,
	image_path = ?, file_type = ? where id = ?";
	$params = array($image_name, $image_path, $file_type, $id);
	$st = $db->prepare($sql);
	$success = $st->execute($params);
	return $success;
}
function delete_post($id) {
	$sql = "delete from posts where id = ?";
	$st = get_db()->prepare($sql);
	$success = $st->execute(array($id));
	return $success;
}

 ?>
