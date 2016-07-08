<?php require 'utils.php'; ?>
<?php 
	if (is_empty($_REQUEST,'id')) {
		$error = "idが指定されていません";
	} else {
	$id = $_REQUEST['id'];
	if (!is_exist($id)) {
		$error = "指定した記事がありません";
	} else {
		delete_post($id);
		}
	}
	if (isset($error)) {
		$page_title = "エラー！！！！！！！";
	} else {
		$page_title = "id=${id}の記事を削除しました";
		}
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>
</head>
<body>
	<header>
		<h1><?php echo $page_title; ?></h1>
	</header>
	<div id="contents">
		<?php if (isset($error)) : ?>
			<p><?php echo $error; ?></p>
		<?php endif; ?>
		<a href="/blog">TOPへ戻る</a>
	</div>
	
</body>
</html>