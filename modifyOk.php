<?php
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";

$bno = $_GET['num'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$sql = mq("update mathboard set pw='".$userpw."',title='".$title."',content='".$content."' where num='".$bno."'"); ?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/read.php?idx=<?php echo $bno; ?>">