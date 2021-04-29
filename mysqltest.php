<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "MySql 연결 테스트<br>";

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

if($conn) {
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패  - " . mysqli_connect_error() . "<br>";
}

$result = mysqli_query($conn, 'SELECT VERSION() as VERSION');
$data = mysqli_fetch_assoc($result);
echo $data['VERSION'];
?>

</body>
</html>