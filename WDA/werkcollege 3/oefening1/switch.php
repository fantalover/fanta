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
       header( "Location: instelling.php");
    }


    $bezoeker = " bezoeker";

    if (isset($_COOKIE["user"])) {
      $bezoeker = $_COOKIE["user"];
    }

    if( isset( $_POST["bezoeker"] ) ) {
       $bezoeker = $_POST["bezoeker"];
       setcookie ( 'user', $bezoeker, time() + 60*60*24*30, '/','localhost');
       $refresh = $_SERVER['PHP_SELF'];
       header( "Location: instelling.php");
    }


      if (isset([""])) {
           = [""];
        }
    
        if( isset( [""] ) ) {
            = [""];
           setcookie ( 'user', , time() + 60*60*24*30, '/','localhost');
            = ['PHP_SELF'];
           header( "Location: file.php");
        }



      
?>