<?php

include "sciboardSave.php";
include "../password.php";
session_start();

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_SESSION['userName'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}

if($username && $title && $content){
    $sql = mq("insert into sciboard(name,title,content,date,lock_post) values('".$username."','".$title."','".$content."','".$date."','".$lo_post."')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='sciboard.php';
    </script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>