<?php

    error_reporting(E_ERROR);

    $lang = "en";

    if( isset( $_COOKIE["language"] ) ) { 
       $lang = $_COOKIE["language"]; 
    }

    if( isset( $_POST["lang"] ) ) {
       $lang = $_POST["lang"];
       setcookie ( 'language', $lang, time() + 60*60*24*30, '/','localhost');
       $refresh = $_SERVER['PHP_SELF'];
       header( "Location: $refresh");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Page Language Toggle</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <?php 
      // Text definitions
      $text = array(
      'en' => array(
            'selectlang' => 'Select Language',
            'lingua' => 'Language: ',
            'filename' => 'You are in this location: '
          ),
      'fr' => array(
            'selectlang' => 'Séléctionner',
            'lingua' => 'Langue: ',
            'filename' => 'Vous lisez ce fichier: '
          ),
      'nl' => array(
            'selectlang' => 'selecteer taal',
            'lingua' => 'taal:',
            'filename' => 'je zit in deze folder'
        )
      );

    ?>

    <form action="language_switcher.php" method="post">
        <select name="lang">
            <option value="en"<?php if( $_COOKIE["language"] == "en" ) { echo "selected"; } ?>>English</option>
            <option value="fr"<?php if( $_COOKIE["language"] == "fr" ) { echo " selected"; } ?>>Français</option>
            <option value="nl"<?php if( $_COOKIE["language"] == "nl" ) { echo " selected"; } ?>>Nederlands</option>

        </select>
        <input type="submit" value="<?php echo $text[$lang][selectlang]; ?>">
    </form>

    <p><?php echo $text[$lang][lingua]; if( isset( $_COOKIE["language"] ) ) { echo $_COOKIE["language"]; } else { echo "<em>not set</em>"; } ?></p>

    <br>
    <p><?php echo $text[$lang][filename] . $_SERVER['PHP_SELF']; ?></p>

</body>
</html>