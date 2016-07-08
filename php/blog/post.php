<?php require 'utils.php'; ?>
<?php 
	$mode = 'new';
	if (is_edit($_POST,'type')) {
		$mode = 'edit';
		$id = $_POST['id'];
	}

	if (is_empty($_POST,'title')){
		$error = "タイトルを設定してください";
	} else if (is_empty($_POST,'contents')){
		$error = '内容を設定してください';
	} else {
		$title = $_POST['title'];
		$contents = $_POST['contents'];
		$image = $_FILES['image'];

		if ($mode == 'edit') {
			update_post($id,$title,$contents,$image);
		} else {
			create_post($title,$contents,$image);
		}
	
	}
	if (isset($error)) {
	$page_title = "エラー！！！！！";
	} else {
		$page_title = "記事を作成しました";
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h1><?php echo $page_title; ?></h1>
	</header>
	<div id="contents">
	<?php if (isset($error)) : ?>
		<p><?php echo $error; ?></p>
		<?php if ($mode == 'edit') : ?>
			<a href="edit.php?id=<?php echo $id; ?>">記事編集画面に戻る</a>
		<?php else: ?>
			<a href="new.php">新規記事作成画面に戻る</a>
		<?php endif; ?>
	<?php endif; ?>
		<a href="index.php">トップに戻る</a>
	</div>
	<footer>
		<?php include "parts/footer.php"; ?>
	</footer>
	
</body>
</html>