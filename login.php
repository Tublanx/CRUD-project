<!DOCTYPE html>
<?php
include('./db.php');
?>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./style.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if (!isset($_SESSION['ss_mb_id'])) { ?>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <h2>Account Login</h2>
                </div>

                <form action="./login_check.php" method="POST">
                    <input type="text" id="mb_id" class="fadeIn second" name="mb_id" placeholder="아이디">
                    <input type="text" id="mb_password" class="fadeIn third" name="mb_password" placeholder="비밀번호">
                    <input type="submit" class="fadeIn fourth" value="로그인">
                </form>

                <div id="formFooter">
                    <a class="underlineHover" href="./sign.php">회원가입</a>
                    <a class="underlineHover" href="#">비밀번호 찾기</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <h2>My Account</h2>
                </div>

                <?php
                $mb_id = $_SESSION['ss_mb_id'];
                $sql = "select * from member where mb_id = '$mb_id'";
                $res = mysqli_query($conn, $sql);
                $mb = mysqli_fetch_assoc($res);

                mysqli_close($conn);
                ?>

                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_id'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_name'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_email'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_gender'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_job'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_language'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_email_certify'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_datetime'] ?>">
                <input type="text" disabled class="fadeIn second" value="<?php echo $mb['mb_modify_datetime'] ?>">

                <div id="formFooter">
                    <a class="btn btn-primary" href="#">회원정보수정</a>
                    <a class="btn btn-primary" href="./logout.php">로그아웃</a>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>