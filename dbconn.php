<?
$conn = mysqli_connect("localhost","root","0000","showmori");

	if($conn->connect_error){
		printf("Connect failed: %s",$conn->connect_error);
		exit();
	}
?>
