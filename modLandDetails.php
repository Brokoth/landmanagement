<?php   session_start();  ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book land online</title>

    <script language="javascript"  type="text/javascript">
        function validate_form(){
        var landID = document.uploadForm.landID.value
        var price = document.uploadForm.price.value
        var acreage = document.uploadForm.acreage.value

        if (landID==null || landID==""){
          alert("Land ID must be filled")
          return false;

        }else if(price==null ||  price==""){
          alert("Price must be filled")
          return false;

        }else if (acreage==null || acreage==""){
          alert("Acreage must be filled")
          return false;

        }else {
          return true;

        }
      }
    </script>

</head>

<body>
  <div align="right">

    <?php
          if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
           {
             echo $_SESSION['user'];
             echo "<br>Login Failure";
               header("Location:llog.php");
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
        </ul>

    </nav>
  </div>
</div>

  <div align="center">
  <h1>Land Modification</h1><br>
</div>

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
$sql = "SELECT * FROM land";
$result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0 ){
    $rowFinder = 1;
    while ($row = mysqli_fetch_array($result)) {

          if(isset($_POST[$rowFinder])) {
            $landID = $row["landid"];
            $price = $row["price"];
            $acreage = $row["acreage"];
            $image = $row["IMAGE"];
            break;

          } else {
            $rowFinder = $rowFinder + 1;
          }
    }
  }
      ?>
      <div align = "center">
          <table>
          <tr>
        	   <td>Land ID:</td>
             <td><input type="text" name="location" value="<?php echo htmlspecialchars($landID); ?>"/></td>

          </tr>

          <tr>
             <td>Price</td>
             <td><input type="text" name="bookingFee" value="<?php echo htmlspecialchars($price); ?>"/></td>

          </tr>

          <tr>
             <td>Guest Capacity</td>

             <td>
               <select name="acreage">
                 <option value="">Number of acres</option>
                 <option selected="<?php echo htmlspecialchars($acreage); ?>"><?php echo htmlspecialchars($acreage); ?> (original)</option>
                 <option value="0.25..0.5">0.25-0.5</option>
                 <option value="0.5..1.0">0.5-1.0</option>
                 <option value="1.0..1.5">1.0-1.5</option>
                 <option value="1.5..2.0">1.5-2.0</option>
                 <option value="2.0..3.0">2.0-3.0</option>
                 <option value="3.0..5.0">3.0-5.0</option>
                 <option value="5.0..10.0">5.0-10.0</option>
                 <option value="10.0..20.0">10.0-20.0</option>
                 <option value="20.0">20.0+</option>
               </select>
             </td>

          </tr>

          <tr>
             <td>Image</td>
             <td><input type="file" name="foto"></td>

          </tr>

        </table>

      <a href='modLandDetails.php'><button type='button' name=edit>Edit</button></a>
      <a href='modLandDetails.php'><button type='button' name=delete>Delete</button></a><br>

    </div>
<a href="owner.php"><button type="button">Back</button></a>
</body>
</html>
