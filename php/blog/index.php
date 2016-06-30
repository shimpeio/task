<?php require 'utils.php'; ?>
<?php
	$limit = 5;
	$offset = 0;
	if (isset($_GET['limit']) and !empty($_GET['limit'])) {
		$limit = $_GET['limit'];
	}
	if (isset($_GET['offset']) and !empty($_GET['offset'])) {
		$offset = $_GET['offset'];
	}
	$stmt = $db->query("select * from posts order by updated desc limit ${limit} offset ${offset}");

	$prev_offset = $offset - $limit;
	if ($prev_offset <= 0) {
		$prev_offset = 0;
	}

	$next_offset = $offset + $limit;
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
		  	<h2>ARTICLE</h2>
		  	<a href="new.php">新規記事作成</a>
		  	<div class="pager">
		  	<?php if($offset > 0) : ?>
		  		<a href="/blog/?offset=<?php echo $prev_offset; ?>"><</a>
		  	<?php endif; ?>
		  		<a href="/blog/?offset=<?php echo $next_offset; ?>">></a>
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
				<a href="delete.php?id=<?php echo $id; ?>" class="delete">削除</a>
		  	</article>
		  <?php endforeach; ?>
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