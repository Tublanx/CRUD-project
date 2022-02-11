<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./style.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <h2>Find Password</h2>
            </div>

            <form action="./id_check.php" method="POST">
                <input type="text" id="mb_name" class="fadeIn second" name="mb_name" placeholder="이름">
                <input type="text" id="mb_id" class="fadeIn third" name="mb_id" placeholder="아이디">
                <input type="submit" class="fadeIn fourth" value="비밀번호 찾기">
            </form>
        </div>
    </div>
</body>

</html>