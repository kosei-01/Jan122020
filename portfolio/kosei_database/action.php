<?php

include 'classes/pokesql.php';
$poke=NEW SQL();
 
	if(isset($_POST['upload'])){
		$pic=$_FILES["pic"]["name"];
		
		$pname=$_POST["pname"];
		$height=$_POST["height"];
		$weight=$_POST["weight"];
		$abi=$_POST["ability"];
    $text=$_POST["text"];
		
		$target_dir="img/";
		$target_file=$target_dir . basename($_FILES["pic"]["name"]);
    
		$ans=$poke->insertPokemon($pname,$height,$weight,$abi,$pic,$text);
		
		if($ans==1){
			move_uploaded_file($_FILES["pic"]["tmp_name"],$target_file);

			header("Location:admin.php");
      
		}

		else{
			echo"error";
		}
	}

 elseif(isset($_POST["register"])){
	
	// $loginid=$_POST["id"];
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$bday=$_POST["bday"];
	$gender=$_POST["gender"];
	
	
   $poke->InsertUserdata($uname,$email,$pass,$bday,$gender);
 }

 elseif(isset($_POST["login"])){
	 session_start();

	$pass=$_POST["pass"];
	$email=$_POST["email"];
	
   $poke->SearchUser($pass,$email);
 }

 elseif(isset($_POST["send"])){
   
	$pname=$_POST["pname"];
	$message=$_POST["message"];
	
	$poke->InsertOpinion($pname,$message);
 }

 elseif(isset($_POST["update"])){
	
	$id=$_POST["id"];
	$uname=$_POST["uname"];	 
	$pass=$_POST["pass"];	 
	$email=$_POST["email"];	 

	$poke->updateData($id,$uname,$pass,$email);
 }

?>	

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fairy books</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <style>
@import url('https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700');
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
/* === fontawesome === */
@import url('font-awesome.css');

*{

	box-sizing:border-box;
	margin:0;
}

body {
	font-family:'Open Sans', Arial, sans-serif;
	font-size:16px;
	font-weight:300;
	line-height:1.6em;
	overflow-x:hidden;
  background-color:#FF99CC;
  /* border:solid 10px #F06292 ; */
}

.page {   
	/* margin: 50px auto; */
    /* max-width: 1200px; */
    /* border: 1px solid #eee; */
    padding: 0;  
    width: 100%;
  	height:100%
}

#header {
	overflow: hidden;
  background-color:#FF99CC;	
  width:1400px;
  
}

.nav-tabs {
	overflow: hidden;	
	border-bottom:0;
  position:relative;
 
}
.nav-tabs li {
  float:left;
	width: 190px;
	list-style: none;
	margin-bottom:0;	
}
.nav-tabs li.box {
	width: auto;
}
.nav-tabs li a {
	display: block;
	position: relative;
	height: 150px;
	-webkit-transition: color ease .4s, background ease .4s;
	-moz-transition: color ease .4s, background ease .4s;
	-ms-transition: color ease .4s, background ease .4s;
	-o-transition: color ease .4s, background ease .4s;
	transition: color ease .4s, background ease .4s;
	color: #fff;
	text-decoration: none;
	border-radius:0;
	margin-left:0;
	margin-bottom:15px;
}

.nav-tabs li.sylveon img
 {
	width:180px;
	margin-left:16px;
	margin-right:-16px;	
	color:white;
	position:absolute;
	left:810px;
	top:-10px;
	z-index:1;
}

.nav-tabs li.profile a {
	background:#CC66FF ;
	margin-left:16px;
	margin-right:-16px;
	color:white;
}
.nav-tabs li.pokedex a {
	background: #FF00CC;
	margin-left:16px;
	margin-right:-16px;
}

.nav-tabs li.board a {
	background: #EA4C89;
	margin-left:16px;
	margin-right:-16px;
}
.nav-tabs li.contact a {
	background: #32CDFB;
	margin-left:16px;
	margin-right:-16px;
}

.nav-tabs li.login a {
	background:  #FF3366 ;
	/* margin-left:16px;
	margin-right:-16px; */
	width:50%;
}

.nav-tabs li.sign a {
	background: #FF00FF ;
	/* margin-left:16px;
	margin-right:-16px; */
	width:50%;
}

.nav-tabs li a:hover{
	background: #fff !important;
	border-radius:0;
}
.nav-tabs li a span {
	font-size: 50px;
	line-height: 50px;
	display: block;
	position: absolute;
	top:50px;
	right:60px;
	text-align:center;
	overflow: hidden;
	font-weight: normal;
	left:50px;		
}

.nav-tabs li.portfolio a span {top: 50px;}
.nav-tabs li.contacts a span {left: 50px;}
.nav-tabs li.facebook a span {right: 50px;}
.nav-tabs li a:hover,
.nav-tabs li.current a {
	color: #ccc;
}

.profile_photo {
	float: left;
	/* min-height: 150px; */
	height:830px;
	/* background: #323232; */
	width: 1350px;
	background-image:url(img/allfairy.jpg);
	background-size: cover;
  background-repeat: no-repeat;
  margin:auto 0;
  border:10px groove #FF33FF; 
	
}
.profile_photo img {
	vertical-align: top;
	width: 100%;
	height: auto;
}
.profile_name {
    background: none repeat scroll 0 0 #FF0066 ;
    float: left;
    height:150px;
    width: 1350px;
    text-decoration:none;
    padding-left:20px;
}

.profile_name a .name {
	margin-top:50px;
    font-weight: 700;
	text-align:center;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-size: 40px;
	text-decoration:none;
	color:#fff;
	
}
.profile_name a:hover {
	text-decoration:none;
}

.profile_name .profile_inner {
	text-align:center;
	font-size:18px;
	color:#fff;	
}

/* --- tab-content --- */
.tab-content {
	background-color:#fff;
	margin-top:-100px;
}
.tab-pane#profile {
	border-bottom:0;
	border-top:0;
}
.panel-group {
  margin-bottom: 0;
  border-radius: 0;
  
}
.panel-group .panel {
  margin-bottom: 0;
  border-radius: 0;
}
.panel-body h5 {
	text-transform:uppercase;
	text-align:center;
	margin-bottom:20px;	
}
.panel-group .panel-heading + .panel-collapse > .panel-body {
  border-top:0;
  border-bottom:0;
  border-top-color:#fff;
}

.panel-default {	
	border:0;	
}

.panel-default .panel-heading {
	background-color:#FF0066 ;
	border:0;	
}

h4.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 18px;
  text-decoration:none; 
  text-align:center;
  text-transform: uppercase;
  padding:30px;
  
}
h5.panel-title {
	margin-bottom: 30px;
	color:#000;
}

.panel-title > a {
  color: inherit;
  text-decoration:none;
  background-color:#FF0066;
  padding:10px 15px;
  color: #fff;
}
.panel-collapse {
	padding-bottom:20px;
	
	
}


.download {
	text-align:center;
	color:#50c0e9;
	text-decoration:none;
}

.download:hover {
	
	color:#1892BF;
	text-decoration:none;
}

.section-header {
	text-align: center;
	padding-top:120px;
}
.section-header h2 {
	text-transform: uppercase;
	font-weight: 700;
	color:#FF0033 ;
}
.section-header p {
	color:#FF0033 ;
	padding-top: 10px;
	
}
#section-works {
	margin-top:-100px;
	background-color: #fff;
}

nav#filter a {
	background-color: #EEE;
	color:#555;	
}

nav#filter a:hover, nav#filter a.current {
	background-color: #50c0e9;
	color:#fff;
}

.tab-content > .tab-pane {
  display: none;
}
.tab-content > .active {
  display: block;
}

#footer {
	margin-top:10px;
	text-align:center;
	margin-bottom:60px;
	color:#666;
	font-size:20px;
	padding-top:30px;
}
.footer_copyright a {
	color:#50C0E9;
	text-decoration:none;
}
.footer_copyright a:hover {
	color:#199DCC;
	
}


    </style>  
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="page">
        <header id="header">
          <ul class="nav nav-tabs">
            <li class="sylveon"><img src="img/Sylveon.png"></li>
            <li class="profile"><a href="profile.php">About us</a></li>
            <li class="pokedex"><a href="pokedex.php">Pokedex</a></li>
            <li class="board"><a href="Bulletinboard.php">Bulletin board</a></li>
            <li class="contact"><a href="Contact.php">Contact us</span></a></li>
            <li class="login"><a href="login.php">Login</span></a></li>
            <li class="sign"><a href="signup.php">Sign up</span></a></li>

		<?php
		if(isset($_POST["search"])){
			
			$pname=$_POST["pname"];
			$height=$_POST["height"];
			$weight=$_POST["weight"];
			$abi=$_POST["abi"];
			// $id=$_POST["id"];

			$result=$poke->showData($pname,$height,$weight,$abi);
			$_SESSION["myarr"]=$result;

			foreach($result as $rows1){
			  $id=$rows1["poke_id"];
				$pname=$rows1["name"];
				// $abi=$rows1["ability"];
				// $height=$rows1["height"];
				// $weight=$rows1["weight"];
				$pic=$rows1["image"];
				// $text=$rows1["text"];
				
				echo"<button><img src='img/$pic'></button><br>";
				echo"".$pname."<br>";

			}

		}	


		?>

</div>


</ul>
</header>
<!-- /Header -->
</div>
</div>
</div>
<!-- Tab panes -->

<a href="#" class="download"><h2>Go back to the top</h2></a>

<footer id="footer">
<div class="footer_copyright">
Copyright &copy; Kosei Suzuki. All rights reserved.
<div class="credits">
<!--
	All the links in the footer should remain intact.
	You can delete the links only if you purchased the pro version.
	Licensing information: https://bootstrapmade.com/license/
	Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Kelly
-->
Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>
</footer>

</body>

</html>

<?php
if($_GET['actiontype']==='delete'){
	$id=$_GET["id"];
	$poke->deleteUser($id);

}

?>
