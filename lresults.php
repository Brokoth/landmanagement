
<?php
session_start();
require_once("lconnect.php");
$mysqli = new mysqli("localhost", "root", "", "lmanagement");
if(isset($_POST['search']))
{
    $valueToSearch = $mysqli->real_escape_string($_REQUEST['look']);
    //$valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
   // $query = "SELECT * FROM `products` WHERE `ProductName` LIKE '%$valueToSearch%'"); 
    //$query = "SELECT * FROM `products` WHERE CONCAT(`ProductName`, `Company Name`, `Price`, `ProductDescription`) LIKE '%".$valueToSearch."%'";
    $query = "SELECT * FROM `land` WHERE `acreage` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
      echo "No match found.";
   // $query = "SELECT * FROM `products`";
   // $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "lmanagement");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

$result = mysqli_query($mysqli,"SELECT * FROM land");
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="lresultsS.css" type="text/css" rel="stylesheet" />
        <title>results</title>
        <style>
                       a {
    color: white;
}
            table,tr,th,td
            {
                border: 1px solid white;
            }
        </style>
    </head>
    <body bgcolor="#CCE5FF">
 
            
<div id="product-grid">
	<div class="txt-heading">Products</div>
</div>
        

            
            <table>
                <tr>
                    <th style="color:#ccc">Image</th>
                    <th style="color:#ccc">Price</th>
                    <th style="color:#ccc">Land ID</th>

                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):
                $_SESSION["id"] = $row['acreage'];
                ?>
                <tr>
                    <td style="color:#ccc"><?php echo $row['image'];?> height="200" width="200" </td>
                    <td style="color:#ccc"><?php echo $row['price'];?></td>
                    <td style="color:#ccc"><?php echo $row['landid'];?></td>
                </tr>
                <?php endwhile;?>
            </table>

    </body>
</html>