<!--- 게시글 수정 -->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
   
	$bno = $_GET['num'];
	$sql = mq("select * from mathboard where num='$bno';");
	$board = $sql->fetch_array();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modify.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php if ($_SESSION['userName']==$board['name']) {?>
<div id="board_write">
        <h1><a href="mathboard.php">수학 게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php?num=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
</div>
<?php 
} else { ?>
    <script>
        alert("본인 글이 아닙니다.");
        location.href = "read.php?num=<?php echo $board['num'];?>"
    </script>
<?php }?>
</body>
</html>