<?php
session_start(); 
include 'header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>contact</title>
</head>
<body>
  
 <main>
   <div class="container">
    <div class="row">
      <form method="post" action="mail.php">
        
        <label>Name</label>
        <input name="name" placeholder="Type Here">
        
        <label>Email</label>
        <input name="email" type="email" placeholder="Type Here">
        
        <label>Message</label>
        <textarea name="message" placeholder="Type Here"></textarea>
        
        <input id="submit" name="submit" type="submit" value="Submit">
        
      </form>
      
    </form>
  </div>
</div>      
</main>
</body>

</html>
<?php 
include 'footer.php';
?>
