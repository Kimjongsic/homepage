<?php

include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
include "password.php";

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_SESSION['userName'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if(empty($_POST['pw'])){
	$lo_post = '0';
}else{
	$lo_post = '1';
}

$mqq = mq("alter table mathboard auto_increment=0"); //auto_increment 값 초기화

if($username && $title && $content){
    $sql = mq("insert into mathboard(name,pw,title,content,date,lock_post) values('".$username."','".$userpw."','".$title."','".$content."','".$date."','".$lo_post."')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='mathboard.php';
    </script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>