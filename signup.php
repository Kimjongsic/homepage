<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
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
                <form action="signupProcess.php" method="post">
                    <div class="input_bar">
                        <div class="id-pw_bar">
                            <input type="text" name="user_id" id="id" class="int" placeholder="아이디">
                        </div>
                        <div class="id-pw_bar">
                            <input type="password" name="user_pw" id="pswd1" class="int" placeholder="비밀번호">
                            <i id="pswd1View" class="far fa-eye" onclick="pwViewer()"></i>
                        </div>
                        <div class="id-pw_bar">
                            <input type="password" name="user_pw_confirm" id="pswd2" class="int" placeholder="비밀번호 확인" onkeyup='check();'>
                            <i id="pswd2Img1" class="fas fa-lock"></i>
                            <i id="pswd2Img2" class="fas fa-unlock"></i>
                        </div>
                        <div class="pw_error">
                            <span id="pswd2Msg">비밀번호가 일치하지 않습니다.</span>
                        </div>
                        <div class="name_bar">
                            <input type="text" name="user_name" id="name" class="int" placeholder="이름">
                        </div>
                        <div class="birth_bar">
                            <div class="year">
                                <input type="text" name="user_year" id="yy" class="bir_int" placeholder="생년(4자)" maxlength="4">
                            </div>
                            <div class="month">
                                <select name="user_month" id="mm" class="bir-sel">
                                    <option value=>월</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="day">
                                <input type="text" name="user_day" id="dd" class="bir_int" placeholder="일">
                            </div>
                        </div>
                        <div class="gender_bar">
                            <select name="user_gender" id="gender" class="gen_sel">
                                <option value selected>성별</option>
                                <option value="M">남자</option>
                                <option value="F">여자</option>
                            </select>
                        </div>
                    </div>
                    <div class="submitbox">
                        <input type="submit" value="가입하기" class="signBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var check = function() {
            if(document.getElementById('pswd1').value == document.getElementById('pswd2').value && document.getElementById('pswd2').value.length > 0) {
                document.getElementById('pswd2Img1').style.display = 'block';
                document.getElementById('pswd2Img2').style.display = 'none';
                document.getElementById('pswd2Msg').style.display = 'none';
            }
            else if(document.getElementById('pswd1').value !== document.getElementById('pswd2').value && document.getElementById('pswd2').value.length > 0) {
                document.getElementById('pswd2Img2').style.display = 'block';
                document.getElementById('pswd2Img1').style.display = 'none';
                document.getElementById('pswd2Msg').style.display = 'block';
            }
            else if(document.getElementById('pswd2').value.length == 0) {
                document.getElementById('pswd2Img2').style.display = 'none';
                document.getElementById('pswd2Img1').style.display = 'none';
                document.getElementById('pswd2Msg').style.display = 'none';
            }
        }

        function pwViewer() {
            var x = document.getElementById('pswd1');
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