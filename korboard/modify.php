<!--- 게시글 수정 -->
<?php
	include "korboardSave.php";
    session_start();
   
	$bno = $_GET['num'];
	$sql = mq("select * from korboard where num='$bno';");
	$board = $sql->fetch_array();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/write.css">
    <link rel="stylesheet" href="/css/head.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <script src="head.js"></script>
    <title>Document</title>
    <style type="text/css">
        .write_bar:focus-within {
            border: 2px solid rgb(52, 168, 83);
        }
        .write_btn {
            background-color: rgb(52, 168, 83);
        }
    </style>
</head>
<body>
<?php if ($_SESSION['userId']==$board['id']) { include "../homeHD.php"; ?>
    <div class="board-title">
        <h1>KOREAN BOARD</h1>
    </div>
    <form action="modify_ok.php?num=<?php echo $bno; ?>" method="post">
        <div class="write_wrap">
            <div class="write_tit">
                <span>제목</span>
                <div class="write_bar">
                <textarea name="title" id="utitle" rows="1" cols="55" maxlength="100" required><?php echo $board['title']; ?></textarea>
                </div>
            </div>
            <div class="secret_wrap">
                <span>비밀글</span>
                <div class="checkbox_wrap">
                    <input style="zoom: 1.2;" type="checkbox" value="1" id="secbtn" name="lockpost" class="secret_btn"
                    <?php if($board['lock_post']=="1") {?> checked
                    <?php } else { }?>
                    >
                </div>
            </div>
            <div class="write_con">
                <div class="write_bar">
                    <textarea name="content" id="ucontent" required><?php echo $board['content']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="submit_btn">
            <input type="submit" value="수정" class="write_btn"></input>
        </div>
    </form>
<?php 
} else { ?>
    <script>
        alert("본인 글이 아닙니다.");
        location.href = "read.php?num=<?php echo $board['num'];?>"
    </script>
<?php }?>
</body>
</html>