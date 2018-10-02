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
          <li><a href="home.html"><button type="button">Online Land Booking</button></a></li>
        </ul>

    </nav>
  </div>
</div>

  <div align="center">
  <h1>Add a land entry</h1><br>

<form name="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
  <table>
  <tr>
	   <td>Land ID:</td>
     <td><input type="text" name="landID" placeholder="Land ID" /></td>
  </tr>

  <tr>
     <td>Price</td>
     <td><input type="text" name="price" placeholder="Price" /></td>
  </tr>

  <tr>
     <td>Acreage</td>

     <td>
       <select name="acreage">
         <option value="">Number of acres</option>
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
     <td>Status</td>

     <td>
       <select name="status">
         <option value="">Status</option>
         <option value="owner">Owner</option>
         <option value="buyer">Buyer</option>
         <option value="seller">Seller</option>
       </select>
     </td>

  </tr>

  <tr>
     <td>Image</td>
     <td><input type="file" name="foto"></td><br>

  </tr>

</table>

<button type="submit">Add entry</button>
</form>

  </div>

<a href="owner.php"><button type="button">Back</button></a>
</body>
</html>
