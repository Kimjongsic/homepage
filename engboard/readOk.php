<?php
include "engboardSave.php";
session_start();

$bno = $_GET['num'];
$sql = mq("select * from engboard where num='$bno';");
$board = $sql->fetch_array();

if ($board['lock_post'] == "1") {
    if ($_SESSION['userId']==$board['id']) {?>
        <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
    <?php }
    else {?>
        <script>
        alert("비밀글 입니다.");
        location.href = "engboard.php"
        </script>
    <?php }
}
else {?>
    <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
<?php }?>