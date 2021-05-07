<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

$hashedPassword = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "INSERT INTO members(id, pw, name, birthday, gender) VALUES('{$_POST['user_id']}', '{$hashedPassword}', '{$_POST['user_name']}', '{$_POST['user_year']}', '{$_POST['user_gender']}')";
echo $sql;
$result = mysqli_query($conn, $sql);
echo $result;

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