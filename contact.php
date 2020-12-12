<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'hog4jesus@gmail.com,lillyofthevalley0621@gmail.com,bethelangel227@bellsouth.net';
				$subject = 'Heart of Grace Inquiry from '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<danielwilson1227@gmail.com>". "\r\n";
				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
					$_POST = array();
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
	
?>
<!DOCTYPE html>
<html>
 <head>
    <title>Heart of Grace Ministries | Contact</title>
    <meta charset="utf-8">
    <meta name="author" content="Daniel Wilson">
    <meta name="description" content="Heart of Grace Ministries Website">
    <meta name="keywords" content="homeless, feeding, ministry, poor, food, clothing, grocery">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="public/css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:1100px)" href="public/css/widescreen.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
    <link rel="shortcut icon" href="#" />
  </head>
<body id="home" class="bg-gold page-container">
    <div id="content-wrap">
   <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container d-flex justify-content-around">
          <img id="hog-logo" src="public/img/heart2.jpg" class="mr-5" alt="logo"> 
          <h2 id="hog-heading" class="text-center text-white">Heart of Grace Ministries</h2>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="what.html">What</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="who.html">Who</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="media.html">Pictures</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>
  <h1 id="contact-heading" class="text-center text-purple mt-0">Contact Us</h1>
    <p class="text-center mb-0">Please use the form below to contact us.</p>
    <div id="contactForm-container" class="pt-2 container">	
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form id="contactForm" class="bg-purple mx-auto mt-2 mb-2 text-center text-white" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
		      <input placeholder="Enter your name" type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
	      	<input type="text" name="email" class="form-control" placeholder="Enter valid email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
	      	<textarea name="message" placeholder="How can we help?" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn bg-gold text-purple mb-2">Submit</button>
      </form>
      </div>
      <!-- Footer-->
<footer id="main-footer" class="bg-lightpurp text-center">
  <div class="container">
   <p>Copyright &copy; 2020, Heart of Grace Ministries, All Rights Reserved</p>
 </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    </div>
</body>
</html>