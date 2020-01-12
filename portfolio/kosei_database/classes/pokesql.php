
<?php

include 'database.php';

class SQL extends Database{

///About Pokemon	
public function insertPokemon($pname,$height,$weight,$abi,$pic,$text){

$sql1="INSERT INTO pokedex (name,height,weight,ability,text)value('$pname','$height','$weight','$abi','$text')";

		if($this->conn->query($sql1)){

		$sql2="INSERT INTO pic(image,name) value('$pic','$pname')";
				 
		    if($this->conn->query($sql2)){
					 
					return 1;
				}
				else{

					return 0;
				}
		}

		else{
			echo"error.".$this->conn->error;
		}

}

public function showData($pname,$height,$weight,$abi){

$sql1="SELECT * FROM Pokedex INNER JOIN pic where Pokedex.ability='$abi' or Pokedex.name='$pname' or Pokedex.height='$height' or Pokedex.weight='$weight' ";	
$rows1=array();
$result=$this->conn->query($sql1);

if($result->num_rows>0){

	while($row1=$result->fetch_assoc()){
     $rows1[]=$row1;
	}

   return $rows1;
}

}

///About user
public function InsertUserdata($uname,$email,$pass,$bday,$gender){
 
	$sql1="INSERT INTO login(password,email) value('$pass','$email')";
	 
	 if($this->conn->query($sql1)){
		$loginid=$this->conn->insert_id;

		$sql2="INSERT INTO user(user_name,birthday,gender,loginid) value('$uname','$bday','$gender','$loginid')";
			
			if($this->conn->query($sql2)){
				echo"You can be our member!!Let's login!!!";
				header("Location:index.php");
				
			}

			else{
				echo"error".$this->conn->error;
			}
		 
	 }

	 else{
		 echo"error".$this->conn->error;
	 }

}

public function SearchUser($pass,$email){

	 $sql="SELECT * from login where password='$pass' AND email='$email' ";
	 $result=$this->conn->query($sql);

	 if($result->num_rows>0){			

		  while($rows=$result->fetch_assoc()){
				$_SESSION['id']=$rows['loginid'];

				if($rows['status']=='A'){
					header("Location:admin.php");
				}

				elseif($rows['status']=='U'){
					header("Location:user.php");
				}

			}
	 }

	 else{
		 echo"error".$this->conn->error;
	 }

}

public function ShowUsers(){

	$sql="SELECT * from user INNER JOIN login on user.loginid=login.loginid";
	// $rows=array();
	$result=$this->conn->query($sql);

    if($result->num_rows>0){
      	
		while($row=$result->fetch_assoc()){ 
		// $rows[]=$row;
	  
		// return $rows;
		$id=$row['user_id'];
		 echo"
		     <tr>
						<td>".$row['user_id']."</td>
						<td>".$row['user_name']."</td>
						<td>".$row['password']."</td>
						<td>".$row['email']."</td>
						<td>".$row['birthday']."</td>
						<td>".$row['gender']."</td>
						<td><a href='update.php?id=$id'>Update</a></td>
						<td><a href='action.php?actiontype=delete&id=$id'>Delete account</a></td>
		     </tr>
		 ";
		}

	}

		else{
			echo"error".$this->conn->error;
		}
}

///About opinion

public function InsertOpinion($pname,$message){

	$sql="INSERT INTO opinion(pen_name,message)value('$pname','$message')";

	if($this->conn->query($sql)){
    header("Location:index.php");
	}

	else{
		echo"error.".$this->conn->error;
	}

}

public function ShowOpinion(){

	$sql="SELECT * from opinion";
	$result=$this->conn->query($sql);

    if($result->num_rows>0){
      	
		while($row=$result->fetch_assoc()){ 
		// $rows[]=$row;
	  
		// return $rows;
		// $id=$row['message_id'];
		 echo"
		     <tr>
						<td>".$row['message_id']."</td>
						<td>".$row['pen_name']."</td>
						<td>".$row['message']."</td>
		     </tr>";
		}

	}

		else{
			echo"error".$this->conn->error;
		}
}

///Kind of actions
public function updateData($id,$uname,$pass,$email){

	$sql="UPDATE user INNER JOIN login on user.loginid=login.loginid
	      SET user.user_name='$uname',
				    login.password='$pass',
						login.email='$email'
				where user.user_id='$id'";
 
 if($this->conn->query($sql)){
	 header("Location:admin.php");
 }

 else{
	 echo"error.".$this->conn->error;
 }
 
}

public function deleteUser($id){

$sql="DELETE user,login from user INNER JOIN login on user.loginid=login.loginid
			where user.user_id='$id'";
		
		if($this->conn->query($sql)){
      header("Location:manageusers.php");
		}

		else{
			echo"error.".$this->conn->error;
		}

}

}

?>