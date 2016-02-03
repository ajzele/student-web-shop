<?php

/**
 * DB Connection Parameters
 */

$host = '127.0.0.1';
$dbname = 'student_web_shop';
$charset = 'utf8';
$username = 'root';
$password = 'my2413';

$DB = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

