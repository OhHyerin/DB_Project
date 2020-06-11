<?
  include './dbconn.php';

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];
  $name = $_POST['user_name'];
  $phone = $_POST['user_phone'];

  $query = "Select * from login where id = '$id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  if(!$num){
    $query2 = "INSERT INTO user_t VALUES (0, '$id', '$pwd', '$name', '$phone')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원가입완료!'); location.href='./signuptest.php'</script>";
  }else{
?>
    <script>
    alert('해당 아이디가 존재함!');
    location.href='./signup_form.php';
    </script>
<?
  }
?>
