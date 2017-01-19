<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 1/18/17
 * Time: 7:16 PM
 */

$user = 'root'; //Insert your username in here when testing.
$pass = 'Jaljap2732!'; //Insert your password in here when testing.
$dbh = new PDO('mysql:host=localhost;dbname=mydb', $user, $pass);


$testForNull = "SELECT id 
		FROM actors 
		WHERE (first_name LIKE '".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."') AND last_name = '".$_GET['lastname']."' 
		AND film_count >= all(SELECT film_count 
								FROM actors 
								WHERE (first_name LIKE'".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."') 
								AND last_name = '".$_GET['lastname']."')";

$validActor = null;

//Testing our highly specific sql query.
foreach($dbh->query($testForNull) as $actor) {
    $validActor = $actor['id'];

    if($validActor == null) {
        echo "<h3> Actor: " . $_GET['firstname'] . " " . $_GET['lastname'] . "Is Not In Our Database. Sorry.</h3>";
    }
}


