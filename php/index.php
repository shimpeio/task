<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>
		ようこそ
		<?php echo $_REQUEST['name']; ?>
		さん！
		あなたは<?php echo $_REQUEST['age']; ?>歳ですね。
		<?php $total = $_REQUEST['age'] + $_REQUEST['plus'];
		echo $total;
		?>
		あなたの顔年齢は<?php echo $_REQUEST['face']; ?>歳ですね
		ヒアドキュメント
		<?php 
			$var = <<<EOT
			アイウエオカキクケコさしすせそたちつてとななにぬねの
			ファJFD竿PGJファおGかFファDじょFJDPさG
			フォジョアSJFぱS
EOT;
		echo $var;
		 ?>
		 
<hr>
		 <!-- /配列 -->
		<?php 
			$array = array('apple','banana','orange');		
		 ?>
		 <pre>
		 	<?php print_r($array); 
		 		echo $array[1];
		 	?>


		<!-- /連想配列 -->
		 	<?php 
		 		$array = array('red' => 'apple', 'yellow' => 'banana', 'orange' => 'orange');
		 		print_r($array);
		 	 ?>


		<!-- /多次元配列 -->
		 	 <?php 
		 	 	$array = array(
		 	 		'red' => array('apple', 'cherry'),
		 	 		'yellow' => array('banana', 'mango'),
		 	 		'orange' => 'orange');
		 	 	print_r($array);
		 	 	echo $array['yellow'][1];
		 	  ?>
		 </pre>
	</p>
</body>
</html>