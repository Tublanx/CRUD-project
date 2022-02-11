<?php
include("./db.php");

$mb_name = trim($_POST['mb_name']);
$mb_id = trim($_POST['mb_id']);

if (!$mb_id || !$mb_name) {
    echo "<script>alert('공란이 있습니다.');</script>";
    echo "<script>location.replace('./findpw.php');</script>";
    exit;
}

$sql = "select * from member where mb_name = '$mb_name' and mb_id = '$mb_id'";
$res = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($res);

if (!$mb['mb_id'] === $mb_id || !($mb_name === $mb['mb_name'])) {
    echo "<script>alert('회원정보가 존재하지 않습니다.');</script>";
    echo "<script>location.replace('./findpw.php');</script>";
    exit;
}

mysqli_close($conn);

$pw = $mb['mb_password'];

echo "<script>alert('회원님의 비밀번호는 $pw 입니다');</script>";
echo "<script>location.replace('./login.php');</script>";
exit;
