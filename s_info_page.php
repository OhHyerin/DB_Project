<html>
<!-- print header -->
<head>
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
      <!-- <font color="BLACK" SIZE="6"><p align="center">SHOW-Mori</p></font> -->
      <!-- <p align="center"><IMG src="line.jpg" width=1000 height=5></IMG></p> -->
    <?
    include './dbconn.php';

    $sInfo = "SELECT S_TITLE,S_POSTER,S_SYNOP,S_GOALSUM,S_DEADLINE,S_PRM from post_t WHERE S_PRM='".$show_p."';";
    $s_info = mysqli_query($conn,$sInfo);

    while($row=mysqli_fetch_array($s_info)){
    echo "
    <div id='postbody'>
        <div class='title'>
          $title
        </div>
        <div class='img_post'>
          <img src='./data/IMG/$poster' width=400;/>
        </div>
        <div class='posttext'>
          <p>모인금액 <span>	&nbsp; $donatedSum 	&nbsp;
          </span>원</p>
          <p>남은시간 <span> 	&nbsp; $leftDate 	&nbsp; </span>일</p>
          <p>후원자        <span> 	&nbsp; 10 	&nbsp; </span>명</p>
          <p class='rectangle'>
            <span>펀딩 진행중</span><br>
            <br> $deadLine 까지 목표금액인 $goalSum 원이 모여야 펀딩이 완성됩니다.<br>
            후원 금액과 리워드는 하단을 참조해 주세요.<br>
          </p>
          <br>
          <select name='reward' class='select_reward'>
            <option value='reward1' selected>￦ 20,000
            <option value='reward2'>￦ 30,000
            <option value='reward3'>￦ 40,000
            <option value='reward4'>￦ 50,000
            </select>
          <input type='submit' value='후원하기' class='submit_button'>
        </div>


      </div>
    <div class='img_synop'>
      <img src='./data/IMG/$synop' width=600 />
    </div>
    ";
}
  mysqli_close($conn);

    ?>

</body>

</html>
