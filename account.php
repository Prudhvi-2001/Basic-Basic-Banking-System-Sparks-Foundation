<?php
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$mail = $_POST['mail'];
//Database Connection
$conn = new mysqli('localhost','root','','summary');
$s = "select * from newaccount where mail= '$mail'";
$result=mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
if ($num == 1){
	echo "<script>alert('Email is already exists')</script>";
	echo "<script>location.href='index.html'</script>";

	
}
else{
if ($conn->connect_error) {
	die('Connection Failed'.$conn->connect_error);
}
else{
	$stmt = $conn->prepare("insert into newaccount(name, mobile, mail) values(?,?,?)");
	$stmt->bind_param('sis',$name, $mobile, $mail);
	$stmt->execute();
	echo "<script>alert('Account is created ')</script>";
	echo "<script>location.href='index.html'</script>";


	$stmt->close();
	$conn->close();
}
}

?>