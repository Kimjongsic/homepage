<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="content">
                <a href="index.php" class="logo">
                    <span>S</span><span>i</span><span>m</span><span>w</span><span>o</span><span>n</span>
                </a>
                <form action="loginProcess.php" method="post">
                    <div class="input_bar">
                        <div class="id-pw_bar">
                            <input type="text" name="user_id" class="id-pw" placeholder="아이디">
                        </div>
                        <div class="id-pw_bar">
                            <input type="password" name="user_pw" id="pswd" class="id-pw" placeholder="비밀번호">
                            <i id="pswdView" class="far fa-eye" onclick="pwViewer()"></i>
                        </div>
                    </div>
                    <div class="Btn">
                        <a href="signup.php" class="join_Btn">회원가입</a>
                        <input type="submit" value="로그인" class="login_Btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function pwViewer() {
            var x = document.getElementById('pswd');
            if(x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>