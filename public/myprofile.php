<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin())
{   
   $user_id=$_SESSION['user_id'];
   include 'header.html';
   $query1="SELECT * FROM users WHERE `user_id`='$user_id'";
   $result1=mysqli_query($connection,$query1);
   $num=mysqli_num_rows($result1);
   if($num==1)
   {
   $info=mysqli_fetch_assoc($result1);
   $name=$info['name'];
   $profession=$info['profession'];
   $company=$info['company'];
   $email_id=$info['email_id'];
   $dob=date_create($info['dob']);
   $gender=$info['gender'];
   $phone_no=$info['phone_no'];
   $about_self=$info['about_self'];
   $profile_pic=$info['profile_pic'];
   }
   else
    echo "Error Occured in loading profile.";

if(empty($profile_pic))
  $profile_pic=addslashes("images/profile.gif");


$m1=date_format($dob,"m");
$Y1=date_format($dob,"Y");
$m2=date("m");
$Y2=date("Y");
$d1=date_format($dob,"d");
$d2=date("d");

if($m2>$m1)
{
$age=$Y2-$Y1;
}
elseif ($m2<$m1)
{
$age=$Y2-$Y1-1;
}
else
{
  if($d2>=$d1)
    $age=$Y2-$Y1;
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
  <link rel="stylesheet" type="text/css" href="stylesheets/myprofile.css">
</head>
<body>
  <div class="card-panel">
  <div class="profile"><img src="<?php echo $profile_pic;?>" height="150px" width="120"></div>
  <div class="name"><?php echo $name;?></div>
  <div class="profession"><?php echo $profession;?> <span>at</span> <?php echo $company;?><br /><?php echo $email_id; ?>
     <br/><br/>
     
     <span>Age/Gender:</span><?php echo $age.'Years';?><span>/</span><?php echo $gender;?><br/>
     <span>Contact No:</span><?php echo $phone_no;?><br/><br/>
     <?php echo $about_self;?>
  </div> 
  </div>
</body>
</html>
