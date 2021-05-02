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