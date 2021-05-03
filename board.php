<?php
            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql2 = mq("select * from mathboard order by num desc limit 0,5");
          $mathboard = $sql->fetch_array();
            //title변수에 DB에서 가져온 title을 선택
            $title=$mathboard["title"]; 
            if(strlen($title)>30)
            { 
              //title이 30을 넘어서면 ...표시
              $title=str_replace($mathboard["title"],iconv_substr($mathboard["title"],0,30,"utf-8")."...",$mathboard["title"]);
            }?>
        <tbody>
            <tr>
                <td width="70"><?php echo $mathboard['num']; ?></td>
                <td width="500"><a href="readOk.php?num=<?php echo $mathboard['num'];?>"><?php echo $title; ?></a></td>
                <td width="120"><?php echo $mathboard['name']; ?></td>
                <td width="100"><?php echo $mathboard['date']; ?></td>
                <td width="100"><?php echo $mathboard['hit']; ?></td>
            </tr>
        </tbody>