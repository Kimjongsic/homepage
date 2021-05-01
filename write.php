<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="write.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2538add9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>수학 게시판</h1>
        <form action="writeOk.php" method="post">
            <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
            <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
            <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />
            <button type="submit">글 작성</button>
        </form>
</body>
</html>