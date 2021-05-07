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

?>