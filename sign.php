<!DOCTYPE html>
<?php
include("./db.php");

?>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <h2>Create Account</h2>
            </div>

            <form action="./sign_check.php" method="POST">
                <input type="text" id="mb_id" class="fadeIn second" name="mb_id" placeholder="아이디">
                <input type="text" id="mb_password" class="fadeIn third" name="mb_password" placeholder="비밀번호">
                <input type="text" id="mb_name" class="fadeIn third" name="mb_name" placeholder="이름">
                <input type="text" id="mb_email" class="fadeIn third" name="mb_email" placeholder="이메일"><br>
                성별 : <label><input type="radio" id="mb_gender" name="mb_gender" value="남자" checked>남자</label>
                <label><input type="radio" id="mb_gender" name="mb_gender" value="여자">여자</label><br>
                <input type="text" id="mb_job" class="fadeIn third" name="mb_job" placeholder="직업">
                <input type="text" id="mb_language" class="fadeIn third" name="mb_language" placeholder="관심언어">
                <input type="submit" class="fadeIn fourth" value="회원가입">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="./login.php">취소</a>
            </div>
        </div>
    </div>
</body>

</html>