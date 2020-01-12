<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>

body{
	font-family:'Open Sans', Arial, sans-serif;
	font-size:16px;
	font-weight:300;
	background-color:#FF99CC;
}

header{
	background-color:#FF00CC;
	height:150px;
	text-align:center;
	padding-top:50px;
}


</style>

</head>
<body>
	<header>
    <h1>Welcome to our website!!</h1>   
 </header>	
  <div class="container-fluid">
   <form action="action.php" method="post">
		<div class="text-center p-4 w-100">
			
			User name<br>
			<input class='mx-auto  w-50 form-control' type='text' name='uname'><br>
			Your e-mail<br>
			<input class='mx-auto  w-50 form-control' type='email' name='email'><br>
			Your Password<br>
			<input class='mx-auto  w-50 form-control' type='password' name='pass'><br>
		  Your birthday<br>
			<input class='mx-auto  w-50 form-control' type='date' name='bday'><br>
			Gender
			<select class='mx-auto  w-50 form-control'  name='gender' >
				<option value="male">Male</option>
				<option value="female">female</option>
		  </select>		
			<input class='mx-auto  w-50 bg-danger form-control' type='submit' name='register' value='Register'><br>
    	   
      <a href="index.php" class="download"><h2>Go back to the top</h2></a>
 
		</div>

	 </form>    

	</div>	

</body>
</html>