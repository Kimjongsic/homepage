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

//아이디 비교와 비밀번호 비교가 필요한 시점이다.
// 1차로 DB에서 비밀번호를 가져온다 
// 평문의 비밀번호와 암호화된 비밀번호를 비교해서 검증한다.
$id = $_POST['user_id'];
$password = $_POST['user_pw'];

// DB 정보 가져오기 
$sql = "SELECT * FROM member WHERE id ='{$id}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['pw'];
$row['id'];
$first = substr($row['name'],0,1);

foreach($row as $key => $r){
    echo "{$key} : {$r} <br>";
}
// echo $row['id'];
// DB 정보를 가져왔으니 
// 비밀번호 검증 로직을 실행하면 된다.
$passwordResult = password_verify($password, $hashedPassword);
if ($passwordResult === true) {
    // 로그인 성공
    // 세션에 id 저장
    session_start();
    $_SESSION['userName'] = $row['name'];
    $_SESSION['userId'] = $row['id'];
    $_SESSION['first'] = $first;
?>
    <script>
        alert("로그인에 성공하였습니다.")
        location.href = "home.php";
    </script>
<?php
} else {
    // 로그인 실패 
?>
    <script>
        alert("로그인에 실패하였습니다");
        location.href = "login.php"
    </script>
<?php
}
?>