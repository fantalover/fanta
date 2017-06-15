<?php
if(!empty($_POST["RatingForm"])) {
 $sql = "INSERT INTO `Rating`(`ProductID`, `Rating`) VALUES (5,4)";
 $result = $conn->query($sql);
}