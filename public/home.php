<?php
require 'core.inc.php';
require 'connect.inc.php';


if(loggedin())
{   
 include 'header.html';


function timepassed($s){
    if($s<60)
      return "few seconds ago...";
    else if($s<(60*60))
      return floor($s/60)." minutes ago...";
    else if($s<(60*60*24))
      return floor($s/(60*60))." hours ago...";
    else if($s<(60*60*60*7))
      return floor($s/(60*60*24))." days ago...";
    else if($s<(60*60*60*7*4))
      return floor($s/(60*60*24*7))." weeks ago";
    else if($s<(60*60*60*7*4*12))
      return floor($s/(60*60*24*7*4))." months ago...";
    else
      return floor($s/(60*60*24*7*4*12))." years ago...";  
  }

  function show($b_title,$b_time,$b_content,$b_name,$b_image,$b_bid)
  {
   ?>
    <div class="card-blog">
       <div class="sub-card"><span><?php echo "$b_name &nbsp&nbsp&nbsp&nbsp ($b_time)"; ?></span></div>
       <?php
       if($b_image!=NULL)
       {
        ?>
        <div class="blog-image">
       <img src="<?php echo $b_image;?>" height="150" width="150">
        </div>
     <?php
      }
      ?>
      <div class=blog-content>
        <?php
      echo "<br/><span><strong>$b_title</strong></span><br/>$b_content<br/>";
     ?>
   </div>
 
   <div class="like">5 Likes</div>
   <form action="home.php" method="POST">
   <input type="submit" name="comment" class="styled-button-1" value="Comment"/>
   <input type="submit" name="like" id="like" class="styled-button-1" onclick="myfunc()" value="Like"/>
   
   <div class="comment-area"><br/>
   <textarea name="comment_area<?php echo $b_bid;?>" rows="1" cols="700">
   </textarea>
   </div>
 </form>

  <?php
  include 'connect.inc.php';
  $query5="SELECT * FROM comments WHERE blog_id='$b_bid'";
$result5=mysqli_query($connection,$query5);
while($comments_info=mysqli_fetch_assoc($result5))
{
  $temp=$comments_info['user_id'];
  $query6="SELECT name FROM users WHERE user_id='$temp'";
$result6=mysqli_query($connection,$query6);
$name_info=mysqli_fetch_assoc($result6);

echo $name_info['name'];
echo "<br/>";
echo timepassed(time()-$comments_info['c_time']);
echo "<br/>";
echo $comments_info['c_content'];
echo "<br/>";

}

?>
 </div>

    </div>



   <?php

  }



$query2="SELECT * FROM blogs";
$result2=mysqli_query($connection,$query2);
while($row=mysqli_fetch_assoc($result2))
{
  $b_title=$row['title'];
  $b_content=$row['content'];
  $b_time=timepassed(time()-$row['time']);
  $b_uid=$row['user_id'];
  $b_bid=$row['blog_id'];
  $b_image=$row['image'];
  $query3="SELECT name FROM users WHERE user_id='$b_uid'";
$result3=mysqli_query($connection,$query3);
$numrows=mysqli_num_rows($result3);
if($numrows==1)
{
 $row3=mysqli_fetch_assoc($result3);
 $b_name=$row3['name']; 
}
 show($b_title,$b_time,$b_content,$b_name,$b_image,$b_bid);

 if(isset($_POST["comment_area"."$b_bid"])&&isset($_POST['comment']))
{
  $c_content=$_POST["comment_area"."$b_bid"];
  $c_time=time();
  $c_uid=$_SESSION['user_id'];
  $c_bid=$b_bid;
  if(!empty($c_content))
  {
    
    $query4="INSERT INTO comments (blog_id,user_id,c_content,c_time) VALUES ('$c_bid','$c_uid','$c_content','$c_time')";
    $result4=mysqli_query($connection,$query4);
    if(!$result4)
    echo "Comment not posted";
  }
   

}



}




if(isset($_POST['submit']))
{
$file_name = $_FILES['imageupload']['name'];
$extension=strtolower(substr($file_name,strpos($file_name,'.')));
$file_path  = $_FILES['imageupload']['tmp_name'];
$file_size = $_FILES['imageupload']['size'];
$file_type = $_FILES['imageupload']['type'];
$max_size=2097152;

//echo "string2";
 if(isset($file_name))
          if(!empty($file_name))
  if($extension=='.jpg'||$extension=='.jpeg'||$extension=='.gif'||$extension=='.png')
    if(($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/gif'||$file_type=='image/png')&&$file_size<=$max_size)
             {  //echo $file_path;
                //echo "string3";
               
                $location='images/post_images/';
                if(move_uploaded_file($file_path,$location.$file_name))
                  
              
              $temp=$location.$file_name;
             // echo "$temp";


              }

}


if(isset($_POST['title'])&&(isset($_POST['content'])))
   {
    $user_id=$_SESSION['user_id'];
    $title=mysqli_real_escape_string($connection,$_POST['title']);
    $content=mysqli_real_escape_string($connection,$_POST['content']);
    $time=time();
    if(!empty($title)&&!empty($content))
    {
    $query1="INSERT INTO blogs (user_id,title,content,image,time) VALUES ('$user_id','$title','$content','$temp','$time')";  
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
 <form action="home.php" method="POST" enctype="multipart/form-data">  
<lable for="title">Blog Title: </lable> <input type="text" name="title" /><br/><br/>
 <lable for="content">Blog Content:</lable> <textarea name="content" rows="3" cols="15">
  </textarea><br/><br/>
  <lable for="imageupload">Upload Image:</lable> <input type="file" name="imageupload" /><br/>
   <input type="submit" name='submit' class="styled-button-1" value="POST"  /> <br/>
</form>
</div>
</div>

</body>
</html>

<script type="text/javascript">
function myfunc() {
   if ($(this).val() == "Like") {
      $(this).val("Unlike");
     
   }
   else {
      $(this).val("Like");
     
   }
};
</script>