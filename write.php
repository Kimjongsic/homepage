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
            <h1>수학 게시판</h1>
                <form action="writeOk.php" method="post">
                    <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    <input type="password" name="pw" id="upw" value="" placeholder="비밀번호"/>
                    <button type="submit">글 작성</button>
                </form>
  <?php }?>
</body>
</html>