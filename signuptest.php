<center>
<h2> 회원정보 </h2>
<p align="center"><a href="./signup_form.php">login</a></p>
<table width="800" border="1">
  <tr>
    <td>회원번호</td>
    <td>아이디</td>
    <td>비밀번호</td>
    <td>회원이름</td>
    <td>전화번호</td>
  </tr>
<?
  include './dbconn.php';

  $query = "Select * from user_t";

?>


</table>
</center>
