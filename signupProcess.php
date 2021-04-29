<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b7ef317dd8b55f:21689411@us-cdbr-east-03.cleardb.com/heroku_0dc45199750e451?reconnect=true"));
$cleardb_server = $cleardb_url["us-cdbr-east-03.cleardb.com"];
$cleardb_username = $cleardb_url["b7ef317dd8b55f"];
$cleardb_password = $cleardb_url["21689411"];
$cleardb_db = substr($cleardb_url["heroku_0dc45199750e451"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$hashedPassword = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "INSERT INTO members(id, pw, name, birthday, gender) VALUES('{$_POST['user_id']}', '{$hashedPassword}', '{$_POST['user_name']}', '{$_POST['user_year']}', '{$_POST['user_gender']}')";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.php";
    </script>
<?php
}
?>