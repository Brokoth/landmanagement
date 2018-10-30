<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="veiwpoint" content="widt=device-width, initial-scale=1">
<title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
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


          <?php
                  $error_msg=$this->session->flashdata('success_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>
    
 </div>
    <div class="box">
            <h1> BUY </h1>
            <form method="post" action="<?php echo base_url('buyer/buy'); ?>">
                <p>Username</p>
                <input type="text" name="username" placeholder = "Enter Username">
                <p>Land ID</p>
                <input type="text" name="landid" placeholder = "Enter Land-ID ">
                <input type="submit" name= "submit" value="BUY">
            </form>
    </div>

    
    
    </body>
</html>
    

    
