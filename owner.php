<?php   session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book land online</title>
</head>

<body>
  <div align="right">

    <?php
          if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
           {
             echo $_SESSION['user'];
             echo "<br>Login Failure";
               header("Location:llog.html");
           }

              echo "Logged in as: ";
              echo $_SESSION['user'];
              echo "<br><a href='logout.php'><button type='button'> Logout</button></a> ";
    ?>
  </div>

<div class="container">
  <div>
   <nav>

        <ul>
          <li><a href="home.php"><button type="button">Online Land Booking</button></a></li>
          <li><a href="addLand.php"><button type="button">Add land entry</button></a></li>
        </ul>

    </nav>
  </div>
</div>

  <div>
  <h1>Your land:</h1><br>

  <?php
  $databaseName = 'lmanagement';
  $databaseUser = 'root';
  $databasePassword = '';
  $databaseHost = 'localhost';

  $conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql1 = "SELECT * FROM land";
  $result1 = mysqli_query($conn,$sql1);

  $sql2 = "SELECT email, phoneno, username FROM user";
  $result2 = mysqli_query($conn,$sql2);
  ?>

  <table align="center">
    <form method="post" name = "landForm" action="modLandDetails.php">

  <?php
        
        require_once 'lconnect.php';
         $sql_query = "select status from user where username='".$_SESSION['user']."'";
        $result = mysqli_query($mysqli,$sql_query);
        $row = mysqli_fetch_array($result);
        $status = $row['status'];
        
      if(mysqli_num_rows($result2) > 0 ){
          while ($row2 = mysqli_fetch_array($result2)) {
            if($row2["username"] === $_SESSION['user']){
               $username = $row2["username"];
               $phoneNumber = $row2["phoneno"];
           }
         }
       }
       if(mysqli_num_rows($result1) > 0 ){
         if($status === "seller" ){
         $rowNumber = 0;
           while ($row1 = mysqli_fetch_array($result1)) {
             if($row1["username"] === $username){
               $rowNumber = $rowNumber + 1;
               echo "<tr>";
               echo "<td>"."<img src=$row1[image] alt='Land Owner' style='width:250px; height:250px'>"."</td>";
               echo "<td><h2>Land ID: ".$row1["landid"]."</h2>";
               echo "<p>Acreage: ".$row1["acreage"]."</p>";
               echo "<p>Price: ".$row1["price"]."</p>";
               echo "<p>Phone Number: ".$phoneNumber."</p>";
               echo "<button name=$rowNumber>Modify</button>"."</td>";
               echo "</tr>";
             }
           }
         }
         }

  ?>
</form>

</table>
  </div>
  <div>
    <a href="home.php"><button type="button">Explore Online Land Booking</button></a>
  </div>

</body>
</html>
