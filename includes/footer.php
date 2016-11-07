<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Cool Ass CSS3 Footer</title>
<!-- Insert main stye sheet here -->
<link rel="stylesheet" href="css/footer.css" type="text/css" /><!-- Footer Stylings -->
</head>
<body>

<div id="footer">
<ul id="footer_menu">

<li class="homeButton"><a href="#"></a></li>

<li><a href="#">Account</a>
<div class="one_column_layout">
<div class="col_1">
<a class="headerLinks">Stream</a>

<a class="headerLinks">Messages</a>
<a class="listLinks" style="font-weight:bold;color:white;">Inbox (7)</a>
<a class="listLinks">Sent</a>
<a class="listLinks">Trash</a>
<a class="listLinks">Compose</a>

<a class="headerLinks">Pictures</a>
<a class="listLinks">Manage Albums</a>
<a class="listLinks">Manage Photos</a>
<a class="listLinks">View All</a>

<a class="headerLinks">Information</a>
<a class="listLinks">Basic Info</a>
<a class="listLinks">Contact</a>
<a class="listLinks">Education</a>
<a class="listLinks">Employment</a>
<a class="listLinks">Links</a>

<a class="headerLinks">Friends</a>
<a class="listLinks">All</a>
<a class="listLinks" style="font-weight:bold;color:white;">Requested (13)</a>
<a class="listLinks">Pending</a>
</div>
</div>
</li>

<!-- Begin 3 Columns Menu Item -->
<li><a href="#">Profile</a>
<div class="three_column_layout">

<div class="col_3">
<h2>Example of Three Columns</h2>
</div>

<div class="col_1">
<p>This is a three columns example. Praesent gravida venenatis felis sed egestas.</p>
</div>
<div class="col_1">
<p>This is a bold text. Sed ac tortor lobortis sem gravida consequat et vel mi.</p>
</div>
<div class="col_1">
<p>This is an italic text sample. Curabitur arcu orci, iaculis vel bibendum gravida tortor lobortis.</p>
</div>

<div class="clear"></div> <!-- Use this clear div to separate rows of content -->

<div class="col_1">
<p class="black_box">This is the black box styling. I use it for my private messenger and also my group chat feature.</p>
</div>
<div class="col_2">
<p>Sed lacus est, iaculis sed sagittis ac, malesuada a felis. Vestibulum vitae dictum mauris. Aenean felis nisl, pulvinar quis blandit et, fermentum ut tortor. In condimentum nisi ut leo fermentum ornare. Praesent gravida venenatis felis sed egestas.</p>
</div>

<div class="clear"></div> <!-- Use this clear div to separate rows of content -->

<div class="col_3">
<h2>My Profile</h2>
</div>

<div class="col_3"> <!-- Examples of paragraphs with side images -->
<p>
<img src="https://buckysroom.org/photos/users/9259/resized/e5a7b6ca7093f5e7fec00c50044241e5.jpg" class="img_left whiteBorder" alt="" />
<a style="display:inline;font-weight:bold;color:white;">Raymond Le Duc</a>
<a href="#">Read more...</a>
</p>
</div>

</div>
</li>
<!-- End 3 Columns Menu Item -->

<li><a href="#">Two Columns</a><!-- Begin 2 Columns Menu Item -->
<div class="two_column_layout"><!-- Begin 2 columns container -->
<div class="col_2">
<h2>Two Column Layout</h2>
</div>
<div class="col_1">
<p>This is a two columns example. Praesent gravida venenatis felis sed egestas.</p>
</div>
<div class="col_1">
<p>Duis sit amet erat enim. Sed ac tortor lobortis sem gravida consequat et vel mi venenatis.</p>
</div>
<div class="clear"></div>
<div class="col_2">
<p>Vivamus ut urna magna. Aenean vehicula feugiat leo, sit amet facilisis felis commodo a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet erat enim.</p>
</div>
</div><!-- End 2 columns container -->
</li><!-- End 2 Columns Menu Item -->

<li>
<a href="#">Programs</a>
<ul class="dropup">
<li><a href="#">Calculator</a></li>
<li><a href="#">Group Chat</a></li>
<li><a href="#">Image Editor 2.0</a></li>
<li><a href="#">Meme Generator</a></li>
<li><a href="#">Private Messenger</a></li>
<li><a href="#">Text Editor</a></li>
</ul>
</li>

<li class="right"><a href="#" class="drop">Log Out</a>
</li>

</ul><!-- End Footer Menu -->

<ul id="notifications">
<li><a href="#" class="notificationIcons"><img src='img/twitter.png' alt="" /></a></li>
<li><a href="#" class="notificationIcons"><img src='img/rss.png' alt="" /></a></li>
<li>
<a href="#" class="notificationIcons"><img src='img/facebook.png' alt="" />
<span> <!-- The span is the text appearing on hover, use the notificationIcons class in the link -->
<img src="http://buckysroom.com/images/defaultProfileImage.png" style="float:left;width:24px;margin-right:5px;"/>
<div style="display:inline;color:#CC0000;font-weight:bold;">Emily May</div> liked your post "What is your favorite book of all time?"
<hr style="border:none;border-bottom:1px solid #777777;"/>
<img src="http://buckysroom.com/images/defaultProfileImage.png" style="float:left;width:24px;margin-right:5px;"/>
<div style="display:inline;color:#CC0000;font-weight:bold;">Emily May</div> liked your post "What is your favorite book of all time?"
<hr style="border:none;border-bottom:1px solid #777777;"/>
<img src="http://buckysroom.com/images/defaultProfileImage.png" style="float:left;width:24px;margin-right:5px;"/>
<div style="display:inline;color:#CC0000;font-weight:bold;">Emily May</div> liked your post "What is your favorite book of all time?"
</span>
</a>
</li>
</ul>

</div>
</body>
</html>
