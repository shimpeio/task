<?php require 'utils.php'; ?>
<?php
	$limit = 5;
	$offset = get_offset();
	$count = get_posts_count();
	$stmt = get_db()->query("select * from posts order by updated desc limit ${limit} offset ${offset}");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Blogトップページ</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="header"></div>
		<div class="title">
			<h1>ペイちゃんハウス</h1>
		</div>
	</header>
	<div class="wrapper">
		<div class="top-img">
			<img src="images/bohol.jpg" class="bohol">
		</div>
		<div class="manu">
				<ul>
					<a href="#"><li class="sub">HOME</li></a>
					<a href="#"><li class="sub">CONTENT</li></a>
					<a href="#"><li class="sub">ABOUT</li></a>
					<a href="#"><li class="sub">NEWS</li></a>
					<a href="#"><li class="sub">CONTACT</li></a>
				</ul>
			</div>
		  <div id="contents">
		  	<h2>ARTICLE</h2>
		  	<a href="new.php">新規記事作成</a>
		  	<div class="pager">
		  	<p>総件数: <?php echo $count; ?></p>
		  	<?php if($offset > 0) : ?>
		  		<a href="/blog/?offset=<?php echo get_prev_offset($limit); ?>">前へ</a>
		  	<?php endif; ?>
		  	<?php if ($offset + $limit < $count) : ?>
		  		<a href="/blog/?offset=<?php echo get_next_offset($limit); ?>">次へ</a>
		  	<?php endif; ?>
		  	</div>
		  <?php foreach($stmt as $row) : ?>
		  	<?php $id = $row['id']; ?>
		  	<article>
		  		<a href="show.php?id=<?php echo $id; ?>" title="">
		  			<?php echo( $row['id']. ' ' . $row['title']); ?>
		  		</a>
		  		<a href="show.php?id=<?php echo $row['id']; ?>" title="">
					<?php echo($row['title']); ?>
				</a>
				<span><?php echo $row['updated']; ?></span>
				<a href="edit.php?id=<?php echo $id; ?>">編集</a>
				<a href="delete.php?id=<?php echo $id; ?>" class="delete">削除</a>
		  	</article>
		  <?php endforeach; ?>
		 </div>
		 <div class="sidebar">
		 	<ul>
		 		<a href="#"><li class="side">新着記事</li></a>
		 		<a href="#"><li class="side">ランキング</li></a>
		 		<a href="#"><li class="side">お知らせ</li></a>
		 		<a href="#"><li class="side">Facebook</li></a>
		 		<a href="#"><li class="side">Twitter</li></a>
		 	</ul>
		 </div>
	 </div>
	<footer>
		<div class="footer">
			<?php include 'parts/footer.php'; ?>
		</div>
	</footer>
	<script type="text/javascript">
		var dels = document.getElementsByClassName('delete');
		for(var i=0; i<dels.length; i++) {
			dels[i].addEventListener('click', function(e){
				if (confirm('削除してもよろしいですか')) {
					return true;
				} else {
					e.preventDefault();
					return false;
				}
			});
		}
	</script>
</body>
</html>