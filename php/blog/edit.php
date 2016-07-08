edit.php
<?php require 'utils.php'; ?>
<?php 
	if(is_empty($_GET,'id')) {
		$error = "idを指定してください";
		$page_title = "エラー！！！！！！！！！！！！！";
	} else {
		$id = $_GET['id'];
		$post = get_post($id);
		$page_title = "記事編集";
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
		<article>
			<?php if (isset($error)) : ?>
				<p><?php echo $error; ?></p>
			<?php elseif(!isset($post)): ?>
				<P>指定した記事が存在しません</P>
			<?php else: ?>
				<form action="post.php" method="post" name="form" enctype="multipart/form-data">
					<div>
						<label for="title">
							タイトル
							<input type="text" name="title" value="<?php echo $post['title'];?>">
						</label>
					</div>
					<div>
						<label for="contents">
							内容
							<textarea name="contents" id="" cols="30" rows="10"><?php echo $post['contents']; ?></textarea>
						</label>
					</div>
					<div>
						<img src="image.php?id=<?php echo $id ;?>">
						<label for="image">
							画像ファイル
							<input type="file" name="image">
						</label>
					</div>
					<div>
						<input type="hidden" name="type" value="edit">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" value="送信">
					</div>
				</form>
			<?php endif ?>
		</article>
	</div>
	<footer>
		<?php include 'parts/footer.php'; ?>
	</footer>
</body>
</html>