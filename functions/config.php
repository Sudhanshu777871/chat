<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/4/14
 * Time: 8:19 AM
 */

require("functions/functions.php");

session_start();

if(empty($_SESSION['exists'])){
    //handle completely new session here
    $color_array=['BlueViolet', 'Brown', 'Crimson','DarkGreen'];
    $_SESSION['color'] = $color_array[array_rand($color_array)];
}
$_SESSION['exists'] = true;
//continue on with normal request