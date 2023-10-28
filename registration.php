<?php
//Establish Connection
include("connection.php");
// get inserted email and password
$email = $_POST['r_email'];
$password = $_POST['r_password'];

// check if the email already exist
$check = "SELECT email FROM loginForm WHERE email='$email'";
$checkResult = $conn->query($check);
//if exist
if ($checkResult->num_rows > 0) {
    echo 'Email already exist';
} else {
    // if doesnt exist, insert email and password in database
    $sql = "INSERT INTO loginForm (email, password) 
    VALUES ('$email', '$password')";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        header("Location: Project.html");
    } else {
        // else redirect to login page with a alert message
        echo "<script>
alert('Email already exist. try something else');
window.location.href='registration.php';
</script>";
    }
    $conn->close();
}
?>6