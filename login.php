<?php
include("connection.php");

//get email and password from user input 
$email = $_POST['l_email'];
$password = $_POST['l_password'];

//check if the email and password exist in database
$sql = "SELECT * from loginForm where email = '$email' and password = '$password' ";
$result = $conn->query($sql);
//if yes, redirect to movie page
if($result->num_rows === 1) {
	header("Location: Project.html");
} else {
	// else redirect to login page with a alert message
	echo "<script>
alert('Invalid email or password');
window.location.href='login.php';
</script>";
}

?>