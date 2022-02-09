<?php
include("./db.php");

$mb_id = trim($_POST['mb_id']);
$mb_password = trim($_POST['mb_password']);
$mb_name = trim($_POST['mb_name']);
$mb_email = trim($_POST['mb_email']);
$mb_job = trim($_POST['mb_job']);
$mb_gender = $_POST['mb_gender'];
$mb_ip = $_SERVER['REMOTE_ADDR'];
$mb_language = trim($_POST['mb_language']);
$mb_datetime = date('Y-m-d H:i:s', time());
$mb_modify_datetime = date('Y-m-d H:i:s', time());

if (!$mb_id || !$mb_password || !$mb_name || !$mb_email || !$mb_email || !$mb_job || !$mb_language) {
    echo "<script>alert('빈칸이 있습니다.');</script>";
    echo "<script>location.replace('./sign.php');</script>";
    exit;
}

$sql = "select * from member where mb_id = '$mb_id'";
$res = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($res);

echo "<script>alert('$sql');</script>";

if ($mb['mb_id'] === $mb_id) {
    echo "<script>alert('아이디가 중복되었습니다.');</script>";
    echo "<script>location.replace('./sign.php');</script>";
    exit;
}

$num = preg_match('/[0-9]/u', $mb_password);
$eng = preg_match('/[a-z]/u', $mb_password);
$spe = preg_match("/[\!\@\#\$\%\^\&\*]/u", $mb_password);

if (strlen($mb_password) < 10) {
    echo "<script>alert('비밀번호의 길이는 100글자 이상이어야 합니다.');</script>";
    echo "<script>location.replace('./sign.php');</script>";
    exit;
}

if (preg_match("/\s/u", $mb_password) == true) {
    echo "<script>alert('비밀번호는 공백없이 입력해주세요.');</script>";
    echo "<script>location.replace('./sign.php');</script>";
    exit;
}

if ($num == 0 || $eng == 0 || $spe == 0) {
    echo "<script>alert('비밀번호 형식이 일치하지 않습니다.');</script>";
    echo "<script>location.replace('./sign.php');</script>";
    exit;
}

$sql = "insert into member set mb_id = '$mb_id', mb_password = '$mb_password', mb_name = '$mb_name', mb_email = '$mb_email', mb_gender = '$mb_gender',  mb_ip = '$mb_ip', mb_language = '$mb_language', mb_datetime = '$mb_datetime', mb_job = '$mb_job'";
$res = mysqli_query($conn, $sql);
if ($res) {
    include_once("./function.php");

    $mb_md5 = md5(pack('V*', rand(), rand(), rand(), rand()));
    $sql = "update member set mb_email_certify2 = '$mb_md5' where mb_id = '$mb_id'";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);

    $certify_href = 'http://localhost/myapp/email_certify.php?$amp;mb_id=' . $mb_id . '$amp;mb_md5=' . $mb_md5;
    $subject = "인증확인 메일입니다.";

    ob_start();
    include_once("./sign_update_mail.php");
    $content = ob_get_contents();
    ob_end_clean();

    $from = "rlgus03453@naver.com";
    $to = $mb_email;

    mailer('관리자', $from, $to, $subject, $content);

    echo "<script>alert('회원가입이 완료되었습니다.\\n메일로 메일인증을 받으셔야 로그인 가능합니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
} else {
    echo "생성 실패: ", mysqli_error($conn);
}
