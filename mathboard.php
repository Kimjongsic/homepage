<?php 
include "mathboardSave.php";
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
        if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
              $page = 1;
            }
              $sql = mq("select * from board");
              $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
              $list = 5; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
            // mathboard에서 상위 10개
          $sql2 = mq("select * from mathboard order by num desc limit $start_num, $list");
          while($mathboard = $sql2->fetch_array()) {
          //title변수에 DB에서 가져온 title을 선택
          $title=$mathboard['title']; 
          if(strlen($title)>30)
          { //title이 30을 넘어서면 ...표시
            $title=str_replace($mathboard['title'],iconv_substr($mathboard['title'],0,30,"utf-8")."...",$mathboard['title']);
          }?>
        <tbody>
            <tr>
                <td class="list-num" width="70"><?php echo $mathboard['num']; ?></td>
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
    <!---페이징 넘버 --->
    <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>
    <div class="btn_div">
        <div id="btn_wrap">
            <a class="write_btn" href="write.php">글쓰기</a>
        </div>
    </div>
</body>
</html>