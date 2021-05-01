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
        <?php
            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = mq("select * from mathboard order by num desc limit 0,5"); 
          while($mathboard = $sql->fetch_array())
          {
            //title변수에 DB에서 가져온 title을 선택
            $title=$mathboard["title"]; 
            if(strlen($title)>30)
            { 
              //title이 30을 넘어서면 ...표시
              $title=str_replace($mathboard["title"],iconv_substr($mathboard["title"],0,30,"utf-8")."...",$mathboard["title"]);
            }
          
        ?>
        <tbody>
            <tr>
                <td width="70"><?php echo $mathboard['num']; ?></td>
                <td width="500"><a href="readOk.php?num=<?php echo $mathboard["num"];?>"><?php echo $title; ?></a></td>
                <td width="120"><?php echo $mathboard['name']; ?></td>
                <td width="100"><?php echo $mathboard['date']; ?></td>
                <td width="100"><?php echo $mathboard['hit']; ?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    <div id="write_btn">
        <a href="write.php"><button>글쓰기</button></a>
    </div>
</body>
</html>