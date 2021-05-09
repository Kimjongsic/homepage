<?php

include "mathboardSave.php";
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
$filepath = "../upload/";
$tmpfile =  $_FILES['image']['tmp_name'];
$o_name = $_FILES['image']['name'];
$filetype = $_FILES['image']['type'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['image']['name']);
$folder = "../../upload/".$filename;
move_uploaded_file($tmpfile,$folder);
echo $filename;

if($username && $title && $content){
    $sql = mq("insert into mathboard(name,title,content,date,lock_post,path,image) values('".$username."','".$title."','".$content."','".$date."','".$lo_post."','".$filepath."','".$o_name."')"); 
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