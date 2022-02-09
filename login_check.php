<?php
include("./db.php");

$mb_id = trim($_POST['mb_id']);
$mb_password = trim($_POST['mb_password']);

if (!$mb_id || !$mb_password) {
    echo "<script>alert('회원아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

$sql = "select * from member where mb_id = '$mb_id'";
$res = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($res);

$sql = "select md5('$mb_password') as pass";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$password = $row['pass'];

if (!$mb['mb_id'] === $mb_id || !($mb_password === $mb['mb_password'])) {
    echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

if ($mb['mb_email_certify'] === '0000-00-00 00:00:00') {
    include_once("./function.php");
    $mb_md5 = md5(pack('V*', rand(), rand(), rand(), rand()));
    $sql = "update member set mb_email_certify2 = '$mb_md5' where mb_id = '$mb_id'";
    $res = mysqli_query($conn, $sql);
    $certify_href = 'http://localhost/myapp/email_certify.php?&amp;mb_id=' . $mb_id . '&amp;mb_md5=' . $mb_md5;
    $subject = "인증확인 메일입니다.";

    ob_start();

    include_once("./sign_update_mail.php");
    $content = ob_get_contents();
    ob_end_clean();

    $from = "rlgus03453@naver.com";
    $to = $mb['mb_email'];

    mailer('관리자', $from, $to, $subject, $content);

    echo "<script>alert('" . $mb['mb_email'] . " 메일로 인증메일을 전송하였습니다.\\n" . $mb['mb_email'] . " 메일로 메일인증을 받으셔야 로그인 가능합니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

$_SESSION['ss_mb_id'] = $mb_id;

mysqli_close($conn);

if (isset($_SESSION['ss_mb_id'])) {
    echo "<script>alert('로그인 되었습니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}
