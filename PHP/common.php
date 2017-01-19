<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 1/18/17
 * Time: 7:16 PM
 */

$user = 'root';
$pass = 'Jaljap2732!';
$dbh = new PDO('mysql:host=localhost;dbname=mydb', $user, $pass);


$testForNull = "SELECT id 
		FROM actors 
		WHERE (first_name LIKE '".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."') AND last_name = '".$_GET['lastname']."' 
		AND film_count >= all(SELECT film_count 
								FROM actors 
								WHERE (first_name LIKE'".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."') 
								AND last_name = '".$_GET['lastname']."')";

