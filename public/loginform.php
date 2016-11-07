<?php

function login($connection,$username,$password,$loc)
{

	$query="SELECT user_id from users where username='$username' and password='$password'";
         $result=mysqli_query($connection,$query);
         $query_num_rows=mysqli_num_rows($result);
         if($query_num_rows==1)
         {
          $result_array=mysqli_fetch_assoc($result);
          $user_id=$result_array['user_id'];
          $_SESSION['user_id']=$user_id;
          header("Location: ".$loc);
          
         }
         else
         {
           echo "Invalid Username/Password combination.";
         }
         if(!$result)
         	die("Database query failed");
}

if(isset($_POST['lusername'])&&isset($_POST['lpassword']))
{
	$lusername=$_POST['lusername'];
	$lpassword=$_POST['lpassword'];
	$loc="myprofile.php";
	if(!empty($lusername)&&!empty($lpassword))
	{
        login($connection,$lusername,$lpassword,$loc);
        

	}
	else
	{
		echo "You must supply both username and password.";
	}
}

if(isset($_POST['name'])&&isset($_POST['emailid'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword']))
{
	$name=$_POST['name'];
	$emailid=$_POST['emailid'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$loc="setprofile.php";
	if(!empty($name)&&!empty($emailid)&&!empty($username)&&!empty($password)&&!empty($repassword))
	{  
		$temp=1;
	 $query1="SELECT email_id FROM users";
     $result1=mysqli_query($connection,$query1);
     while($row=mysqli_fetch_assoc($result1))
     	{if($row['email_id']==$emailid)
          $temp=0;
        }
	 if($temp)
	 {
		if($password==$repassword)
		{
          $query2="INSERT into users(name,email_id,username,password) VALUES ('$name','$emailid','$username','$password')";
          $result2=mysqli_query($connection,$query2);
          if(!$result2)
          {
          	echo "Something gone wrong. Please try again.";
          }
          else
          {
          	
          	login($connection,$username,$password,$loc);
          	
          }
		}
		else
		{
			echo "The two passwords are not same.";
		}
	 }
	 else
	 {
       echo "The E-Mail ID already exists.";
	 }
      

	}
	else
	{
		echo "Please fill all the fields.";
	}

}


?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Post Your Blogs</title>
<link rel="stylesheet" type="text/css" href="stylesheets/login.css" />
</head>
<body>


<div class="container">
	<section id="content">
		<form action="<?php echo $current_file; ?>" method="POST">
			<h1>Login </h1>
			<div>
				<input type="text" placeholder="Username" required="" id="lusername" name="lusername" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="lpassword" name="lpassword" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Lost your password?</a>
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->

<div class="container">
	<section id="content">
		<form action="<?php echo $current_file;?>" method="POST">
			<h1> Sign Up</h1>
			<div>
				<input type="text" placeholder="Name" required="" name="name" />
			</div>
			<div>
				<input type="text" placeholder="E-Mail ID(abc@xyz.com)" required="" name="emailid" />
			</div>
			<div>
				<input type="text" placeholder="Username" required="" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				<input type="password" placeholder="Re-type Password" required="" name="repassword" />
			</div>
			<div>
				<input type="submit" value="Sign Up Now" />
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>