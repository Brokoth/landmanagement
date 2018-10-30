

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book venues online</title>
<style>
        body{
   background-color: #ADD8E6;
} 
    </style>
    <script language="javascript"  type="text/javascript">
        function validate_form(){
        var location = document.uploadForm.location.value
        var price = document.uploadForm.price.value
        var acreage = document.uploadForm.acreage.value

        if (location==null || location==""){
          alert("First name must be filled")
          return false;

        }else if(bookingFee==null ||  bookingFee==""){
          alert("Last name must be filled")
          return false;

        }else if (guestCapacity==null || guestCapacity==""){
          alert("Email must be filled")
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

              echo "Logged in as tobi1 ";
 
    ?>
  </div>

<div class="container">
  <div>
   <nav>


    </nav>
  </div>
</div>

  <div align="center">
  <h1>Add Land</h1><br>

<form name="uploadForm" action="<?php echo base_url('seller/add'); ?>" method="POST" enctype="multipart/form-data">
  <table>
  <tr>
	   <td>Location:</td>
     <td><input type="text" name="location" placeholder="Location (e.g. Naivasha)" /></td>

  </tr>

  <tr>
     <td>Price (Ksh)</td>
     <td><input type="text" name="price" placeholder="Price (Ksh)" /></td>

  </tr>

  <tr>
     <td>Acreage</td>
     <td><input type="text" name="acreage" placeholder="Acreage" /></td>


  </tr>

  <tr>
     <td>Image</td>
     <td><input type="file" name="foto"></td><br>

  </tr>

</table>

<button type="submit">Add Land</button>
</form>

  </div>

<a href="<?php echo base_url('user/login_view');  ?>"><button type="button">Back</button></a>
</body>
</html>
