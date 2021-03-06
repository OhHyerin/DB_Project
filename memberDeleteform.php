<!-- 회원탈퇴 처리 -->

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
   <style>
  @import url("https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&t&family=Nanum+Gothic:wght@800&display=swap");
  #contents{
      position: relative;
      width:600px;
      height:100px;
      top: 250px;
      background-color: #EAEAEA;
      margin: 0 auto;
      text-align: center;
  }
  #contents span{
      font-family:"Nanum Brush Script";
      font-size:30px;
      padding: 0 10;
      position: absolute;
      top: 40%;
      left:30%;
  }
  #getShowInfo_btn{
      position:relative;
      top:110%;
      margin:0 auto;
      background-color: #F96B6B;
      border-radius: 12px;
      font-size:18px;
      color:white;
      border: 10px;
      height: 35px;
  }
  #contents a:visited{ color:white; }
  }
  </style>
 </head>

 <body>
   <div id="header"></div>
   <?php
      $id = $_SESSION['userid'];

      include './dbconn.php';
      $sql1 = "SELECT * FROM user_t WHERE ID='".$id."';";
      $res1 = mysqli_query($conn, $sql1);
      while($row1 = mysqli_fetch_array($res1)){

        $sql2 = "SELECT * FROM post_t WHERE ID='".$row1['ID']."';";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);

        $uprm=$row1['ID'];
        $sprm=$row2['S_PRM'];


        $delmem1 = "DELETE FROM d_info_t WHERE ID='".$uprm."';";
        $delmem1 .= "DELETE D FROM D_INFO_T as D JOIN POST_T as P ON D.S_PRM=P.S_PRM WHERE P.ID =(SELECT ID FROM USER_T WEHRE ID='".$id."');";
        $delmem1 .= "DELETE S FROM S_DATE_T AS S JOIN POST_T AS T ON S.S_PRM=T.S_PRM WHERE T.ID =(SELECT ID FROM USER_T WHERE ID='".$id."');";
        $delmem1 .= "DELETE FROM post_t WHERE ID='".$uprm."';";
        $delmem1 .= "DELETE FROM user_t WHERE ID='".$uprm."';";
        $resultdel1 = mysqli_multi_query($conn,$delmem1);
          session_destroy();
      }
    ?>

    <p id="contents">
      <span>회원 탈퇴가 완료되었습니다.</span>
      <button id="getShowInfo_btn"><a href="./main_page.html"> 메인 페이지로 가기 </a></button>
    </p>
</body>
