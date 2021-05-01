<?php
include $_SERVER['DOCUMENT_ROOT']."/mathboardSave.php";

$bno = $_GET['num'];
$sql = mq("select * from mathboard where num='$bno';");
$board = $sql->fetch_array();

if ($board['pw']) {
    if ($_SESSION['userName']==$board['name']) {?>
        <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
    <?php }
    else {?>
        <script>
        alert("비밀글 입니다.");
        location.href = "mathboard.php"
        </script>
    <?php }
}
else { ?>
    <script>location.href="read.php?num=<?php echo $board['num'];?>"</script>
<?php }?>