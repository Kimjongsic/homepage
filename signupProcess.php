<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
$conn->set_charset("utf8");

function mq($sql) {
    global $conn;
    return $conn->query($sql);
}

$userid = $_POST['user_id'];
$userpw = $_POST['user_pw'];
$username = $_POST['user_name'];
$useryear = $_POST['user_year'];
$usersex = $_POST['user_gender'];
$userpwcf = $_POST['user_pw_confirm'];
$hashedPassword = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
echo $hashedPassword;

$id_check = mq("select * from members where id='$userid';");
$id_check = $id_check->fetch_array();
if($id_check >= 1){
	echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
}elseif($userpw !== $userpwcf){
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
}
else{
    $sql = mq("insert into members(id,pw,name,birthday,gender) values('".$userid."','".$hashedPassword."','".$username."','".$useryear."','".$usersex."')");
    echo $sql;
    $result = mysqli_query($conn, $sql);
    echo $result;
    if ($result === false) {
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
        echo mysqli_error($conn);
    } else {
        echo "<script>alert('회원가입이 완료되었습니다.'); location.href='login.php';</script>";
    }
}?>