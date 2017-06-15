<?php
session_start();
$_SESSION["ID"] = "";
session_destroy();
header("Location: ../");
?>