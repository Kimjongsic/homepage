<?php
	include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";
	
	$bno = $_GET['num'];
	$sql = mq("delete from mathboard where num='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/mathboard.php" />