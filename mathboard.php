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
    <link rel="stylesheet" href="mathboard.css">
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
} else {
    include "homeHD.php";
}?>
    <div class="board-title">
        <h1>MATH BOARD</h1>
    </div>
    <table class="list-table">
        <thead>
            <th class="list-num" width="70">번호</th>
            <th class="list-title" width="500">제목</th>
            <th class="list-name" width="120">글쓴이</th>
            <th class="list-date" width="100">작성일</th>
            <th class="list-hit" width="100">조회수</th>
        </thead>
    <?php
            // mathboard에서 상위 10개
          $sql = mq("select * from mathboard order by num desc limit 0,10");
          while($mathboard = $sql->fetch_array()) {
          //title변수에 DB에서 가져온 title을 선택
          $title=$mathboard['title']; 
          if(strlen($title)>30)
          { //title이 30을 넘어서면 ...표시
            $title=str_replace($mathboard['title'],iconv_substr($mathboard['title'],0,30,"utf-8")."...",$mathboard['title']);
          }?>
        <tbody>
            <tr>
                <td class="list-num" width="70">#</td>
                <td class="list-title" width="500"><?php
                if($mathboard['lock_post']=="1") {?>
                <a href="readOk.php?num=<?php echo $mathboard['num'];?>"><?php echo $title ?> <i class="fas fa-lock"></i> 
                <?php ;} else {?>
                <a href="readOk.php?num=<?php echo $mathboard['num'];?>"><?php echo $title; }?>
                </a></td>
                <td class="list-name" width="120"><?php echo $mathboard['name']; ?></td>
                <td class="list-date" width="100"><?php echo $mathboard['date']; ?></td>
                <td class="list-hit" width="100"><?php echo $mathboard['hit']; ?></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
    <div class="btn_div">
        <div id="btn_wrap">
            <a class="write_btn" href="write.php">글쓰기</a>
        </div>
    </div>
</body>
</html>