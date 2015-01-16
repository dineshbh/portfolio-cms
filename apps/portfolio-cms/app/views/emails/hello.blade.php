<!--This is a blade template that goes in email message to site administrator-->
<?php
//get the first name
$first_name = Input::get('first_name');
$last_name = Input::get ('last_name');
$email = Input::get ('email');
$subject = Input::get ('subject');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?> 

<h1>You've been contacted by.... </h1>

<p>First name: <?php echo ($first_name); ?></p>
<p>Last name: <?php echo($last_name);?></p>
<p>Email address: <?php echo ($email);?></p>
<p>Subject: <?php echo ($subject); ?><p>
<p>Message: <?php echo ($message);?></p>
<p>Date: <?php echo($date_time);?></p>
<p>User IP address: <?php echo($userIpAddress);?></p>