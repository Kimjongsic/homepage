<?php 
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mathboard.css">
    <!-- <link rel="stylesheet" href="head.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <h1>수학 게시판</h1>
    <table class="list-table">
        <thead>
            <th width="70">번호</th>
            <th width="500">제목</th>
            <th width="120">글쓴이</th>
            <th width="100">작성일</th>
            <th width="100">조회수</th>
        </thead>
    </table>
    <div id="write_btn">
        <a href="write.php"><button>글쓰기</button></a>
    </div>
</body>
</html>