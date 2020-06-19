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
   <div id="deletepro">
   <?php
      $id = $_SESSION['userid'];

      include './dbconn.php';
      $sql1 = "SELECT * FROM user_t WHERE ID='".$id."';";
      $res1 = mysqli_query($conn, $sql1);
      while($row1 = mysqli_fetch_array($res1)){

        $sql2 = "SELECT * FROM post_t WHERE U_PRM='".$row1['U_PRM']."';";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);

        $uprm=$row1['U_PRM'];
        $sprm=$row2['S_PRM'];


        $delmem1 = "DELETE FROM d_info_t WHERE U_PRM='".$uprm."';";
        $delmem1 .= "DELETE s FROM s_date_t as s JOIN post_t as t ON s.s_prm=t.s_prm WHERE t.u_prm='".$uprm."';";
        $delmem1 .= "DELETE FROM post_t WHERE U_PRM='".$uprm."';";
        $delmem1 .= "DELETE FROM user_t WHERE U_PRM='".$uprm."';";
        $resultdel1 = mysqli_multi_query($conn,$delmem1);


          echo '회원탈퇴 완료되었습니다.<p/>';
          session_destroy();
      }

    ?>

    <input type="button" value="홈으로" onClick="location='main_page.html'">
  </div>
</body>
