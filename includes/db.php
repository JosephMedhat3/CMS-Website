<?php

static $DB_HOST = 'localhost';
static $DB_USER = 'root';
static $DB_PASS = '';
static $DB_NAME = 'cms';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(!$connection)
{
    echo"No Connection To DataBase";
}
?>