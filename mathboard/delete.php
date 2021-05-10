<?php
	include "mathboardSave.php";
	session_start();
	
	$bno = $_GET['num'];
	$sql1 = mq("select * from mathboard where num='$bno';");
	$board = $sql1->fetch_array();
	if ($_SESSION['userId']==$board['id']) {
	$sql2 = mq("delete from mathboard where num='$bno';");
?>
	<script type="text/javascript">alert("삭제되었습니다.");</script>
	<meta http-equiv="refresh" content="0 url=mathboard.php" />
<?php } else {?>
	<script>
	alert("본인 글이 아닙니다.");
	location.href = "read.php?num=<?php echo $board['num'];?>"
	</script>
<?php }?>