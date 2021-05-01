<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header class="navbar">
        <div id="button" class="icon">
            <div class="icon_bg" onclick="myBtn()">
                <img class="icon_img" src="\icon\dots-menu.png" alt="아이콘">
            </div>
            <div id="Dropdown" class="hamberg">
                <a href="" class="left_icon">
                    <i class="fas fa-school" style="color: rgb(66, 133, 244);"></i>
                    <p>소개</p>
                </a>
                <a href="" class="center_icon">
                    <i class="fas fa-newspaper" style="color: rgb(234, 67, 53);"></i>
                    <p>소식</p>
                </a>
                <a href="" class="right_icon">
                    <i class="fas fa-users" style="color: rgb(251, 188, 5);"></i>
                    <p>학생마당</p>
                </a>
                <br>
                <a href="" class="left_icon">
                    <i class="fas fa-chalkboard-teacher" style="color: rgb(66, 133, 244);"></i>
                    <p>교사마당</p>
                </a>
                <a href="" class="center_icon">
                    <i class="fas fa-door-open" style="color: rgb(52, 168, 83);"></i>
                    <p>열린마당</p>
                </a>
                <a href="" class="right_icon">
                    <i class="fas fa-lock-open" style="color: rgb(234, 67, 53);"></i>
                    <p>정보공개</p>
                </a>
            </div>
        </div>
        <div class="user_bg">
            <div class="user">
        <?php
        if(isset($_SESSION['userId'])){
            echo $_SESSION['first'];
        }
        ?>
            </div>  
        </div>
        <a href="logout.php" class="logoutBtn">로그아웃</a>
    </header>
    <section class="name">
        <span>S</span><span>i</span><span>m</span><span>w</span><span>o</span><span>n</span>
    </section>
    <section class="search">
        <div class="search_bar">
            <i class="fas fa-search"></i>
            <form action="https://www.google.com/search" method="GET">
                <input name="q" type="text" class="google_search" placeholder="Google 검색">
            </form>
        </div>
    </section>
    <section class="container">
        <div id="cont" class="container_menu">
                <a href="mathboard.php" class="tile">
                    <i class="fas fa-square-root-alt" style="color: rgb(66, 133, 244);"></i>
                    <div class="tile_name">
                        <span>Math Field</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-font" style="color: rgb(234, 67, 53);"></i>
                    <div class="tile_name">
                        <span>Eng Field</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-flask" style="color: rgb(251, 188, 5);"></i>
                    <div class="tile_name">
                        <span>Sci Field</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <div class="tileicon_bg">
                        <img src="\icon\hangul_icon.svg" alt="" class="hangul_icon">
                    </div>
                    <div class="tile_name">
                        <span>Kor Field</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-camera-retro" style="color: rgb(52, 168, 83);"></i>
                    <div class="tile_name">
                        <span>학교앨범</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-ad" style="color: rgb(234, 67, 53);"></i>
                    <div class="tile_name">
                        <span>팝업존</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-share" style="color: rgb(66, 133, 244);"></i>
                    <div class="tile_name">
                        <span>바로가기</span>
                    </div>
                </a>
                <a href="" class="tile">
                    <i class="fas fa-house-user" style="color: rgb(251, 188, 5);"></i>
                    <div class="tile_name">
                        <span>학급홈페이지</span>
                    </div>
                </a>
        </div>
    </section>

    <script>
        function myBtn() {
            document.getElementById("Dropdown").classList.toggle("show");
        }
        document.getElementById("Dropdown").addEventListener('click', function (event) {
            event.stopPropagation();
        });
        window.onclick = function(event) {
            if (!event.target.matches('.icon_bg') && !event.target.matches('.icon_img')) {
              
                var dropdowns = 
                document.getElementsByClassName("hamberg");
                  
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
<!-- <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> -->
</html>