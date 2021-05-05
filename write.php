<?php
	include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="write.css">
    <link rel="stylesheet" href="head.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <script src="head.js"></script>
    <title>Document</title>
</head>
<body>
<?php if (empty($_SESSION['userId'])) {?>
        <script>
        alert('로그인 후 이용바랍니다.');
        history.back();
        </script>
<?php } else { include "homeHD.php"; ?>
    <div class="board-title">
        <h1>MATH BOARD</h1>
    </div>
    <form action="writeOk.php" method="post">
        <div class="write_wrap">
            <div class="write_tit">
                <span>제목</span>
                <div class="write_bar">
                <textarea name="title" id="utitle" rows="1" cols="55" maxlength="100" required></textarea>
                </div>
            </div>
            <div class="secret_wrap">
                <span>비밀글</span>
                <div class="checkbox_wrap">
                    <input style="zoom: 1.2;" type="checkbox" value="1" id="secbtn" name="lockpost" class="secret_btn">
                </div>
            </div>
            <div class="write_con">
                <div class="write_bar">
                    <textarea name="content" id="ucontent" required></textarea>
                </div>
            </div>
        </div>
        <div class="submit_btn">
            <input type="submit" value="확인" class="write_btn"></input>
        </div>
    </form>
  <?php }?>
</body>
</html>