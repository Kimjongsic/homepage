<?php
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";

$bno = $_GET['num'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}
$sql = mq("update mathboard set pw='".$userpw."',title='".$title."',content='".$content."',lock_post='".$lo_post."' where num='".$bno."'"); ?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/read.php?num=<?php echo $bno; ?>">