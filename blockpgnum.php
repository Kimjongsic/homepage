<div class="page_num_wrap">
    <div id="page_num">
        <?php
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<strong>$i<strong>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<a href='?page=$i'>[$i]</a>"; //아니라면 $i
            }
          }
        ?>
    </div>
</div>