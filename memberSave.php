<html>
<meta charset="utf-8">
<head>
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
  <div id="loginbody">
<?php
  include './dbconn.php';

  $id=$_POST['id'];
  $password=($_POST['pass']);
  $name=$_POST['name'];
  $phone=$_POST['phone'];

  $sql = "insert into user_t (id, pw, u_name, u_phone)";
  $sql = $sql. "values('$id', '$password', '$name', '$phone')";

  if($conn->query($sql)){
    echo 'success inserting <p/>';
    echo $name.'님 가입 되셨습니다!.<p/>';
  }else{
    echo 'fail to insert sql';
  }
  mysqli_close($conn);

  ?>
  <input type="button" value="로그인하러가기" onClick="location='loginpage.php'">
</div>
</body>
  </html>
