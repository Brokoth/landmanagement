<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "discounting app");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
//$first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
$username = $mysqli->real_escape_string($_REQUEST['user']);
//$last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
$password = $mysqli->real_escape_string($_REQUEST['pass']);
//$email = $mysqli->real_escape_string($_REQUEST['email']);
 $email = $mysqli->real_escape_string($_REQUEST['email']);
// attempt insert query execution
$sql = "INSERT INTO buyers (Username, Password, Email ) VALUES ('$username', '$password', '$email')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Disco</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="reg.css">
        <div class="reg">
            <img src="icon2.png" id="logIcon">
            <form action="insert.php" class="regform" method="post" >
                <label for="user">Username</label><br>
                <input type="text" class="inputs" name="user" placeholder="Enter your username" size="40"><br><br>
                <label for="">Password</label><br>
                <input type="password" class="inputs" name="pass" placeholder="Enter your password" size="40"><br><br>
                <label for="">Email</label><br>
                <input type="text" class="inputs" name="email" placeholder="Enter your email" size="40"><br><br>
<input type="submit" id="buttonlog" value="Create Account">
            </form> 
        </div>
        <div class="signup">
            
        </div>
    </body>
</html>