<?php
include('./db.php');

$mb_id = trim($_GET['mb_id']);
$mb_md5 = trim($_GET['mb_md5']);
$mb_email_certify = date('Y-m-d H:i:s', time());

$sql = "select mb_id, mb_email_certify2 from member where mb_id = '$mb_id'";
$res = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($res);

if (!$mb['mb_id']) {
    echo "<script>alert('존재하는 회원이 아닙니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

$sql = "update member set mb_email_certify2 = '' where mb_id = '$mb_id'";
$res = mysqli_query($conn, $sql);

if ($mb_md5) {
    if ($mb_md5 == $mb['mb_email_certify2']) {
        $sql = "update member set mb_email_certify = '$mb_email_certify' where mb_id = '$mb_id'";
        $res = mysqli_query($conn, $sql);
        echo "<script>alert('메일인증 처리를 완료 하였습니다.\\n\\n지금부터 " . $mb_id . " 아이디로 로그인 가능합니다.');</script>";
    } else {
        echo "<script>alert('메일인증 요청 정보가 올바르지 않습니다.')</script>";
    }
}

mysqli_close($conn);
echo "<script>location.replace('./login.php')</script>";
exit;
