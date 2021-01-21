<html>
<head>
<title>Logout Chat</title>
<style>
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}
.content {
  position: fixed;
  top: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
</style>
</head>
<body>
<video width="100%" loop="true" height="100%" loop="true" autoplay="autoplay" id="myVideo">
  <source src="rahul.mp4" type="video/mp4">
</video>
<div class="content">
  <h1 style="text-align:center;font-size:2vw;text-decoration:underline;">BookNBook.Com</h1>
  <p style="font-size:1.5vw;text-align:center;">Nice To Meet You - Vijay Sonar (Managaing Director Of BookNBook.com) && Akhilesh Sahu (Director Of BookNBook.com)</p>
</body>
<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/12/14
 * Time: 11:59 AM
 */
require("functions/config.php");

// check the logout value being sent with the POST (or GET) request
if (isset($_GET['log_out']))
{
    // if true, run function logout
    logout();
}
// wait 1 second before going to next line of code
sleep(1);
// after 1 second go to logout form
render("login_form.php", ["name"=>""]);
?>
</html>