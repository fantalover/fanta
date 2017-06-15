
<?php
include 'header.php';
    $name = $_POST['name'];
    $message = $_POST['message'];
    $from = $_POST['email']; 
    $to = 'philpilgrim29@gmail.com'; 
    $subject = 'Hello';
    
			
    $body = "From: $name\n Message:\n $message";
				
    if ($_POST['submit']) {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<center><H4>Your message has been sent!</H4></center>';
	} else { 
	    echo '<center><H4>Something went wrong, go back and try again!</H4></center>'; 
	} 
    }
    include 'footer.php';
?>