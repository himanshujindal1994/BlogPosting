<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin())
{   
  $user_id=$_SESSION['user_id'];
   include 'header.html';
if(isset($_POST['submit']))
{
   $file_name = $_FILES['file']['name'];
$extension=strtolower(substr($file_name,strpos($file_name,'.')));
$file_path  = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$max_size=2097152;


 if(isset($file_name))
          if(!empty($file_name))
  if($extension=='.jpg'||$extension=='.jpeg'||$extension=='.gif'||$extension=='.png')
    if(($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/gif'||$file_type=='image/png')&&$file_size<=$max_size)
             {  //echo $file_path;
                
               
                $location='images/profile_pic/';
                if(move_uploaded_file($file_path,$location.$_SESSION['user_id'].$extension))
                  
              
              $temp=$location.$_SESSION['user_id'].$extension;
             // echo "$temp";


              }

}


   if(!isset($_POST['fullname'])&&!isset($_POST['profession'])&&!isset($_POST['company'])&&!isset($_POST['username'])&&!isset($_POST['about_self']))
            if(!isset($_POST['phone_no'])&&!isset($_POST['dob'])&&!isset($_POST['email_id'])&&!isset($_POST['password']))
            {
              
              
            }

   if(isset($_POST['fullname'])&&isset($_POST['profession'])&&isset($_POST['company'])&&isset($_POST['username'])&&isset($_POST['about_self']))
      if(isset($_POST['phone_no'])&&isset($_POST['dob'])&&isset($_POST['email_id'])&&isset($_POST['password'])&&isset($_POST['gender']))
        { 
          
          $name=$_POST['fullname'];
          $profession=$_POST['profession'];
          $company=$_POST['company'];
          $username=$_POST['username'];
          $phone_no=$_POST['phone_no'];
          $x=date_create($_POST['dob']);
          $dob=date_format($x,"Y-m-d");
          $about_self=$_POST['about_self'];
          $email_id=$_POST['email_id'];
          $password=$_POST['password'];
          $gender=$_POST['gender'];
          
            if(!empty($name)&&!empty($profession)&&!empty($company)&&!empty($username)&&!empty($about_self))
            if(!empty($phone_no)&&!empty($dob)&&!empty($email_id)&&!empty($password)&&!empty($gender))
            {
              $query1="UPDATE `users` SET `name`='$name',`profession`='$profession',`company`='$company',`dob`='$dob',`email_id`='$email_id',
                `about_self`='$about_self',`username`='$username',`password`='$password',`phone_no`='$phone_no',`gender`='$gender',`profile_pic`='$temp' WHERE `user_id`='$user_id'";
            $result1=mysqli_query($connection,$query1);

          if(!$result1)
          {
            echo "Something gone wrong. Please try again.";
          }
          

            }
        }

      





   
}
else{
include 'loginform.php';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>
      Post Your Blogs
    </title>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
     <link rel="stylesheet" type="text/css" href="stylesheets/setprofile.css" />
      <script>

  $(document).ready(function() {
    $("#datepicker").datepicker();
  });

  </script>

</head>
<body>
  <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
      <div class="card-panel">
        <h1>UPDATE YOUR PROFILE</h1><br/><br/>
    <div>Full Name<span>*</span> <input type="text" name="fullname" required=""/><br /><br /></div>
    
    

    <div>
    Profession<span>*</span> <select name="profession" required="">
            <option value="NULL">Select</option>
        <option value="Student">Student</option>
        <option value="Business">Business</option>
        <option value="Job">Job</option>
        <option value="Volunteer">Volunteer</option>
        <option value="Others">Others</option>
      </select><br /><br />
    </div>

    <div>
        Workplace/Institute<span>*</span> <input type="text" name="company" required=""/> <br /> <br />
    </div>

        <div>
    Profile Picture 
         <input type="file" name="file" value="images/profile.gif"/>
         <br />
     <br />
    </div>
    <div>
     Gender<span>*</span>
         <div class="male">Male:<input type="radio" name="gender" value="Male" required="" /></div>
         <div class="female">Female:<input type="radio" name="gender" value="Female" required=""/></div>
         <br />
     <br />
    </div>
    <div>
    Contact Number<span>*</span>
         <input type="text" name="phone_no" min="10" max="10" required=""/>
         <br />
     <br />
    </div>
    <div>
    Email-Id<span>*</span> <input type="text" name="email_id" required="" /><br /><br />        
    </div>
    <div>
        <label for="dob">Date of Birth<span>*</span></label> <input type="text" name="dob" id="datepicker" required=""/><br /><br />
    </div>
    <div>
    About Yourself 
         <textarea name="about_self" >
         </textarea>
         <br />
     <br /><br/><br/>
    </div>
    <div>
         <label for="username">Usename</label><span>*<span> <input type="text" name="username" required=""/><br /><br />
    </div>

    <div>
         Password<span>*</span> <input type="password" name="password" required=""/><br /><br />
    </div>

  
    <div><br />
         <input type="submit" name="submit" class="styled-button-1" value="Update" /> 
        </div>

         <br/>
         <br/>
        <span>* marked fields are mandatory.</span>
    </div>

  </form>
<br/><br/><br/><br/>
</body>

</html>
