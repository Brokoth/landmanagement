<?php   session_start();  ?>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$databaseName = 'lmanagement';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = 'localhost';

$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Note* This is basic sanitizing but you can be more careful with this
$landID = $conn->real_escape_string($_REQUEST['landID']);
$price = $conn->real_escape_string($_REQUEST['price']);
$acreage = $conn->real_escape_string($_REQUEST['acreage']);
$status = $conn->real_escape_string($_REQUEST['status']);

$sql = "SELECT `email` FROM user WHERE username ='".$_SESSION['user']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$email = $row["email"];

$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];

$file_to_saved = "Uploaded_Images/".$file_get; //Documents folder, should exist in your host in there you're going to save the file just uploaded
move_uploaded_file($temp, $file_to_saved);

// Concatenate the $values into the string
CREATE TABLE `land` (
  `username` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `acreage` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `landid` int(255) NOT NULL
)
$sql = "INSERT INTO land (username, image, acreage, price, status, landid)
    VALUES ('".$_SESSION['user']."','".$file_to_saved."','".$acreage."','".$price."','".$status."','".$landID."')";

if ($conn->query($sql) !== FALSE) {
  header("Location: http://127.0.0.1/owner.php");
} else {
  echo $conn->error;
}
$conn->close();
?>
