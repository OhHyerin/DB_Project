<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- print header -->
  <link rel="stylesheet" type="text/css" href="./login.css">
  <link rel="stylesheet" type="text/css" href="./post.css">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript">
    //페이지가 로드되면 실행한다.
    $(document).ready( function() {

      $("#header").load("header.php");
    });
  </script>
</head>

<body>
  <div id="header"></div>
  <div id="wrap_deletemember">
    <div id="title_deletemember">
        <div id="passinfo_deletemember">
          회원 탈퇴 하시겠습니까?
        </div>
        <div id="button1_deletemember">
          <input type="button" value="취소하기" onClick="location.href='http://localhost/DB프로젝트/main_page.html'">
          <input type="button" value="탈퇴하기" onClick="location.href='http://localhost/DB프로젝트/memberDeleteform.php'">
        </div>
    </div> <!-- end of title_deletemember -->
  </div> <!-- end of wrap_deletemember -->
</body>
</html>
