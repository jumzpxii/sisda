<?
    include "conn.php";
    $directory = "../images/The Art of Public Speaking";
    $check = scandir($directory);
    $a=count($check);
    echo $a;
    
?>