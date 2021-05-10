<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$conn = new mysqli($hostname, $username, $password, $database);

$conn->set_charset("utf8");

function mq($sql) {
    global $conn;
    return $conn->query($sql);
}

	if($_POST['userid'] != NULL){
	$id_check = mq("select * from members where id='{$_POST['userid']}'");
	$id_check = $id_check->fetch_array();
	
	if($id_check >= 1){
		echo "<style type="text/css">
                .id_check {
                    color: rgb(234, 67, 53);
                    font-size: 12px;
                }
            </style> 이미 사용중인 아이디입니다.";
	} else {
		echo "<style type="text/css">
                .id_check {
                    color: rgb(52, 168, 83);
                    font-size: 12px;
                }
            </style> 사용가능한 아이디입니다.";
	}
}
?>