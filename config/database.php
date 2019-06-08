<?php
define("HOST" , 'localhost');
define("USER", 'root');
define("PASSWORD",'');
define("DB",'usersinfo');

$connection=mysqli_connect(HOST ,USER,PASSWORD,DB );

if(!$connection){
    die(mysqli_error($connection));

}