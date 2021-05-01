<?php

include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
include "password.php";

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_SESSION['userName'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($username  && $title && $content){
    $sql = mq("insert into mathboard(name,pw,title,content,date) values('".$username."','".$userpw."','".$title."','".$content."','".$date."')"); 
    // echo "<script>
    // alert('글쓰기 완료되었습니다.');
    // location.href='mathboard.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_POST['pw'] ?>
    <br>
    <?php echo $userpw ?>
</body>
</html>