<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
  include './dbconn.php';

  $memberid=$_POST['user_id'];
  $memberpassword=($_POST['user_password']);

  $sql = "SELECT * FROM user_t WHERE id='$memberid' AND pw='$memberpassword'";
  $sql = $sql. "values('$id', '$password', '$name', '$position')";
  $res = $conn->query($sql);

    $row = $res->fetch_array(MYSQLI_ASSOC);

    if($row != null){
      $_SESSION['ses_username'] = $row['user_name'];
      echo $_SESSION['ses_username'].'님 안녕하세요<p/>';
      echo '<a href="./loginpage.php">로그아웃하기</a>';
    }

    if($row == null){
      echo("<script>location.href='loginerror.php';</script>");
    }
  ?>
<html>
<head>
  <title>로그인</title>
  <script>
    function checkform(){
      if(!document.login_form.user_id.value){
        alert('아이디가 입력되지 않았습니다. ');
        document.login_form.user_id.focus();
        return;
      }
      else if(!document.login_form.user_password.value){
        alert('비밀번호가 입력되지 않았습니다. ');
        document.login_form.user_password.focus();
        return;
      }
      document.login_form.submit();
    }
  </script>
</head>
<body>
    <form action='./login2.php' name='login_form' method='post'>
      <CENTER>로그인</div>
        <label>아이디 : </label><input type="text" name="user_id" class="box"/><br>
        <label>비밀번호 : </label><input type="text" name="user_password" class="box"/></br>

        <center><input type="button" value="로그인" OnClick="checkform();"/><br>
        </form>

</body>
</html>
