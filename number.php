<?php
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$number = $_POST['number'];
$slot = $_POST['slot'];


//Database Connection
$conn = new mysqli('localhost','root','','query');
if ($conn->connect_error) {
	die('Connection Failed'.$conn->connect_error);
}
else{
	$stmt = $conn->prepare("insert into info(firstname, secondname, number, slot) values(?,?,?,?)");
	$stmt->bind_param('ssss',$firstname, $secondname, $number, $slot);
	$stmt->execute();
	echo "<script>alert('Thank You, You will get a call')</script>";
	echo "<script>location.href='index.html'</script>";


	$stmt->close();
	$conn->close();
}

?>