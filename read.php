<?php 
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from mathboard where num ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update mathboard set hit = '".$hit."' where num = '".$bno."'");
		$sql = mq("select * from mathboard where num='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
        $pw1 = $_POST['pw'];
        $pw2 = $board['pw'];
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
    <?php 
    function Verify() {
        if(password_verify($pw1, $pw2)) {
           echo "<script>location.href='modify.php';</script>";
            }
        else{
            echo "<script>alert('본인 글이 아닙니다.');</script>";
         }
    } ?>
	<div id="bo_ser">
		<ul>
			<li><a href="mathboard.php">[목록으로]</a></li>
			<li><a href="#" onclick="Verify();">[수정]</a></li>
			<li><a href="delete.php?num=<?php echo $board['num']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>