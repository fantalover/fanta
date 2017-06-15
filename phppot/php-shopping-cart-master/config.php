<?php
$currency = '&#8377; '; //Currency Character or code

$db_username = 'WDA033';
$db_password = '67485923';
$db_name = 'WDA033';
$db_host = 'dtsl.ehb.be';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>