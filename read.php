<?php 
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
include "password.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
	<link rel="stylesheet" href="head.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <script src="head.js"></script>
	<title>Document</title>
</head>
<body>
<?php if(empty($_SESSION['userId'])) {
    include "indexHD.php";
}else {
    include "homeHD.php";
}?>
<?php
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from mathboard where num ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update mathboard set hit = '".$hit."' where num = '".$bno."'");
		$sql = mq("select * from mathboard where num='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
	<div class="board-title">
        <h1>MATH BOARD</h1>
    </div>
	<div class="post_title">
		<h2>
            <?php echo $board['title']; 
            if($board['lock_post']=="1") {?> <i class="fas fa-lock"></i> <?php }?>
        </h2>
	</div>
	<div class="info_wrap">
		<ul class="post_info">
            <li>
                <span class="post_info_tit">글쓴이</span>
                <span class="post_info_text"><?php echo $board['name']; ?></span>
            </li>
            <li>
                <span class="post_info_tit">작성일</span>
                <span class="post_info_text"><?php echo $board['date']; ?></span>
            </li>
            <li>
                <span class="post_info_tit">조회수</span>
                <span class="post_info_text"><?php echo $board['hit']; ?></span>
            </li>
        </ul>
	</div>
	<div class="content_wrap">
        <div class="post_content">
            <?php echo nl2br("$board[content]"); ?>
        </div>
    </div>
	<!-- 목록, 수정, 삭제 -->
	<div class="bar_wrap">
        <ul class="post_bar">
            <li class="delete_wrap"><a href="delete.php?num=<?php echo $board['num']; ?>">삭제</a></li>
            <li class="modify_wrap"><a href="modify.php?num=<?php echo $board['num']; ?>">수정</a></li>
        </ul>
    </div>
    <div class="listbtn_wrap">
        <div class="list_wrap">
            <a class="list_btn" href="mathboard.php">목록</a>
        </div>
    </div>
</body>
</html>