<?php
function Connect()
{
    $dbhost = "rileyghost.com";
    $dbuser = "";
    $dbpass = "";
    $dbname = "regform_db";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

    return $conn;
}

?>