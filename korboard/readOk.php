<?php
include "korboardSave.php";
session_start();

$bno = $_GET['num'];
$sql = mq("select * from korboard where num='$bno';");
$board = $sql->fetch_array();

if ($board['lock_post'] == "1") {
    if ($_SESSION['userName']==$board['name']) {?>
        <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
    <?php }
    else {?>
        <script>
        alert("비밀글 입니다.");
        location.href = "korboard.php"
        </script>
    <?php }
}
else {?>
    <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
<?php }?>