<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="veiwpoint" content="widt=device-width, initial-scale=1">
<title>Search</title>
<style>
.maindiv{
	align: center;
	margin-top: 100px
}
.other{
	align: center;
	margin-top: 100px;
}
p{
	background-color: Blue;
	padding:10xp;
    boder:10xp solid black;	
}

Body{

}
.box{
    width: 320px;
    height: 420px;
    background: rgba(0,0,0,0.5);
    color: #fff;
    top: 60%;
    left: 40%;
    position: absolute;
    transform: translate(-50%,_50%);
    box-sizing:border-box;   
    padding: 70px 30px;
}
.box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
.box input{
    width: 100%;
    margin-bottom: 20px;    
}
.box input[type="text"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.box input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}
.box a{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}
.box a:hover{
    color:#39dc79;
}   
    body{
   background-color: #ADD8E6;
} 
    
  </style>
	
<link href="<?php echo base_url('assets/css/table.css')?>" rel="stylesheet">

</head>
<body>

<h1> LAND DATA </h1>

<div class= "maindiv">
<form align="center" action="" method="post">
 <input type="text" name="search" class="search" placeholder="Search for acreage...">
 <input type="submit" value=">>"/>
 </form>
 </div>
    <div class="box">
            <h1> BUY </h1>
            <form method="post" action="#">
                <p>Username</p>
                <input type="text" name="username" placeholder = "Enter Username">
                <p>Land ID</p>
                <input type="text" name="landid" placeholder = "Enter Land-ID ">
                <input type="submit" name= "submit" value="BUY">
            </form>
    </div>

<?php 
include('connection.php');
$output = '';
if(isset($_POST['search'])) {
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM land WHERE acreage LIKE '%$searchq%'") or die("could not search!");
	$count = mysqli_num_rows($query);
	if($count == 0){
		$output = 'There was no search results!';
	} else{
		while ($row = mysqli_fetch_array($query)) {
			$acr = $row['acreage'];
			$pri = $row['price'];
			$id = $row['landid'];
			$output .='<div>'.$acr.' ha &nbsp&nbsp KSH '.$pri.' &nbsp &nbsp ID '.$id.'</div>';
		}
	}
}
;
?>


<?php
include('connection.php');
if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $landid=$_POST['landid'];
    
    $sql= "UPDATE land SET username = '".$uname."', status = 'Sold' WHERE landid = '".$landid."'  ";
    
    $result=mysqli_query($conn,$sql);
    
}
?>



<div class="other"> 
<?php
include('connection.php');
$sqlget = "SELECT * FROM land";
$sqldata = mysqli_query($conn, $sqlget) or die ('ERROR');

echo"<table>";
echo"<tr><th>UserName </th><th>Acreage </th><th>Prce </th><th>Status </th><th>LandID </th></tr>";
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
      echo "<tr><td>";
	  echo $row['username'];
	  echo "</td><td>";
	  echo $row['acreage'];
	  echo "</td><td>";
	  echo $row['price'];
	  echo "</td><td>";
	  echo $row['status'];
	  echo "</td><td>";
	  echo $row['landid'];
	  echo "</td></tr>";
	  }
echo "</table>";
?>
</div>
<div class="last"><p><?php print("$output");?></div></p>

</body>
</html>