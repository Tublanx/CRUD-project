<?php
$conn = mysqli_connect("localhost", "root", "1234", "project");

if (!$conn) {
    die("연결 실패");
}

session_start();
