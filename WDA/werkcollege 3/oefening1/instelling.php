<?php 

	include "taal.php";
	include "switch.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>sup</title>
</head>
<body>
<form action="switch.php" method="post">
        <select name="lang">
            <option value="en"<?php if( $_COOKIE["language"] == "en" ) { echo "selected"; } ?>>English</option>
            <option value="fr"<?php if( $_COOKIE["language"] == "fr" ) { echo " selected"; } ?>>Français</option>
            <option value="nl"<?php if( $_COOKIE["language"] == "nl" ) { echo " selected"; } ?>>Nederlands</option>

        </select>
        <input type="submit" value="<?php echo $text[$lang][selectlang]; ?>">
    </form>  

    <p><?php echo $text[$lang][lingua]; if( isset( $_COOKIE["language"] ) ) { echo $_COOKIE["language"]; } else { echo "<em>not set</em>"; } ?></p>

    <form action="switch.php" method="post">
    		<input name="bezoeker" type="text" placeholder="type your name here!">
    		<input type="submit" value="suck it">
    </form>

 <form action="switch.php" method="post">
        <select name="color">
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="blue">blue</option>

        </select>
        <input type="submit" value="<?php echo $text[$lang][selectlang]; ?>">
    </form>  


   <a href="homepage.php"><?php echo $text[$lang][back]; ?></a>
</body>
</html>
