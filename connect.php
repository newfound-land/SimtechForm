<?php
$mail_login="your_mail";
$mail_password="password";
$mail_recipient="recipient_mail";
$database="database_name";
$username="some_user";
$password="some_password";
$host="localhost";
 $connect = mysqli_connect($host,$username,$password);
 mysqli_select_db($connect,$database) or die("Can't connect to database ");
  ?>
