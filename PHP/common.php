<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 1/18/17
 * Time: 7:16 PM
 */

$user = 'root'; //Insert your username in here when testing.
$pass = 'Jaljap2732!'; //Insert your password in here when testing.
$dbh = new PDO('mysql:host=localhost:3306;dbname=mydb', $user, $pass);
//$dbh = new PDO('mysql:host=localhost:8889;dbname=kevinBacon', 'root', 'root');



function printDirectors($sqlQuery) {

    $index = 0; //Counting index for our table
    global $dbh; //this is how we refer to our global $dbh up top.

    foreach ($dbh->query($sqlQuery) as $result) {
        echo "<tr><td class=\"index\">";
        echo $index + 1 ."</td>";
        echo "<td class=\"FirstName\">";
        echo $result['first_name'] ."</td>";
        echo "<td class=\"LastName\">";
        echo $result['last_name'];
        echo "</td></tr>";
        $index++;
    }
}
    $dbh = null; //terminate connection to database.

//Commented for now. Uncomment later once you implement logic to check if we need
//to fire this query.
//$testForNull = "SELECT id
//		FROM actors
//		WHERE (first_name LIKE '".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."') AND last_name = '".$_GET['lastname']."'
//		AND film_count >= all(SELECT film_count
//								FROM actors
//								WHERE (first_name LIKE'".$_GET['firstname']." %' OR first_name = '".$_GET['firstname']."')
//								AND last_name = '".$_GET['lastname']."')";
//
//$validActor = null;
//
////Testing our highly specific sql query.
//foreach($dbh->query($testForNull) as $actor) {
//    $validActor = $actor['id'];
//
//    if($validActor == null) {
//        echo "<h3> Actor: " . $_GET['firstname'] . " " . $_GET['lastname'] . "Is Not In Our Database. Sorry.</h3>";
//    }
//}


