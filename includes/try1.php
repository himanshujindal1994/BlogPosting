<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin())
{   
 include 'header.html';
if(isset($_POST['submit'])&&isset($_POST['title'])&&(isset($_POST['content'])))
   {
    $user_id=$_SESSION['user_id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    if(!empty($title)&&!empty($content))
    {
    $query1="INSERT INTO blogs (user_id,title,content) VALUES ('$user_id','$title','$content')";  
    $result1=mysqli_query($connection,$query1);
    if(!$result1)
      echo "Blog not posted.";
    }

}
}
else{
include 'loginform.php';
}

?>



<html>
<head>
  <title>Post Your Blogs</title>
  <link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>
<body>
<div class="card-panel">
  <div class="sub-card"><span>POST YOUR BLOG HERE:</span><br/><br/>
 <form action="try1.php" method="POST" enctype="multipart/form-data">  
<lable for="title">Blog Title: </lable> <input type="text" name="title" /><br/><br/>
 <lable for="content">Blog Content:</lable> <textarea name="content" rows="3" cols="15">
  </textarea><br/><br/>
  <lable for="imageupload">Upload Image:</lable>  <input type="submit" name='submit' class="styled-button-1" value="POST"  /> <br/>
</form>
</div>
</div>

</body>
</html>

