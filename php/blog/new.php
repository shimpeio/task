<?php require 'utils.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>記事新規作成</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
	<div class="header"></div>
		<div class="title">
			<h1>新規記事作成</h1>
		</div>
	</header>
	<div class="new-top"></div>
	<div id="content">
		<article>
			<form action="post.php" method="post" name="form" enctype="multipart/form-data">
				<div>
					<label for="title">
						<p class="pei">タイトル</p>
						<input type="text" name="title">
					</label>
				</div>
				<div>
					<label for="contents">
						<p class="pei">内容</p>
						<textarea name="contents" id="" cols="30" rows="10"></textarea>
					</label>
				</div>
				<div>
					<label for="image">
						<p class="pei">画像</p>
						<input type="file" name="image">
					</label>
				</div>
				<div>
					<input type="submit" value="送信">
				</div>
			</form>
		</article>
	</div>
	<footer>
		<?php include 'parts/footer.php'; ?>
	</footer>
</body>
</html>