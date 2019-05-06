<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:15
 */

$dbhost = 'localhost';
$dbuser = 'root';
$dbname = 'recipe_app';
$dbpass = '';

$db = new  PDO(
    "mysql:host=$dbhost;dbname=$dbname",
    $dbuser,
    $dbpass
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);