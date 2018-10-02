
<?php
require_once 'lconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
//if(isset($_POST['but_submit'])){
//$buyer="buyer";
$uname = $mysqli->real_escape_string($_REQUEST['user']);
$password = $mysqli->real_escape_string($_REQUEST['pass']);
    if ($uname != "" && $password != ""){

        $sql_query = "select username , status from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($mysqli,$sql_query);
        $row = mysqli_fetch_array($result);

     $count = $row['cntUser'];

        if($result->num_rows > 0)      {
              session_start();
            $_SESSION['user'] = $uname;
            $status = $row['status'];

if($status == "buyer"){
  header('Location: lbuyer.php');
                      } 
            else {
      header('Location: owner.php');
                 }
          
                         }
        
        else{
            echo "Invalid username and password";
            }

                                        }
    
}
    ?>