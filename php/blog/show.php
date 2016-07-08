<?php require 'utils.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Blog詳細</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="header">
			<h1>Blogトップページ</h1>
		</div>
	</header>
	<div class="wrapper">
		<div class="top-img">
			<img src="images/bohol.jpg" class="bohol">
		</div>
		<div class="manu">
				<ul>
					<li class="sub">HOME</li>
					<li class="sub">CONTENT</li>
					<li class="sub">ABOUT</li>
					<li class="sub">NEWS</li>
					<li class="sub">CONTACT</li>
				</ul>
			</div>
	 <div id="contents">
	 	<article>
	 		<?php 
	 			if (isset($_GET['id'])) {
		 			$id = $_GET['id'];
		 			$stmt = $db->query("select * from posts where id = ${id}");
		 			if ($stmt->rowCount() == 0) {
		 				echo "指定された記事がありません";
		 		}	else {
		 			foreach ($stmt as $row) {
		 				$post = $row;
		 			}
		 		} 
	 		} else {
	 				echo "IDが指定されていません";
	 			}
	 		 ?>
	 		 <?php if (isset($post)) { ?>
	 		 <h2><?php echo $post['title']; ?></h2>
	 		 <p><?php echo $post['created']; ?></p>
	 		 <p><?php echo $post['updated']; ?></p>
	 		 <p><?php echo $post['contents']; ?></p>
	 		 <img src="image.php?id=<?php echo $id; ?>"> 
	 		 <?php } ?>
	 	</article>
	 </div>
	 <div class="sidebar">
		 	<ul>
		 		<li class="side">新着記事</li>
		 		<li class="side">ランキング</li>
		 		<li class="side">お知らせ</li>
		 		<li class="side">Facebook</li>
		 		<li class="side">Twitter</li>
		 	</ul>
		 </div>
	<footer>
		<div class="footer">
			<?php include 'parts/footer.php'; ?>
		</div>
	</footer>
</body>
</html>