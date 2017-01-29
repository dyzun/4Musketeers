<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 1/18/17
 * Time: 7:16 PM
 */

$dsn = 'mysql:host=localhost:3306;dbname=project1';
$user = 'root'; //Insert your username in here when testing.
$pass = '';//Insert your password in here when testing.
$dbh = new PDO($dsn, $user, $pass);

session_start();

function baconId(){
    $baconsql = "SELECT id FROM actors WHERE first_name='Kevin' AND last_name='Bacon'";
    try{
        global $dbh;
        foreach($dbh->query($baconsql)as $result){
            $baconid = $result['id'];
        }
    } catch (PDOException $e) {
        print  "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    return $baconid;
}

function printDirectors($sqlQuery) {

    $index = 0; //Counting index for our table
    global $dbh; //this is how we refer to our global $dbh up top.

    try {
        foreach ($dbh->query($sqlQuery) as $result) {
            echo "<tr><td class=\"index\">";
            echo $index + 1 . "</td>";
            echo "<td class=\"FirstName\">";
            echo $result['first_name'] . "</td>";
            echo "<td class=\"LastName\">";
            echo $result['last_name'];
            echo "</td></tr>";
            $index++;
        }
        $dbh = null; //terminate connection to database.
    } catch (PDOException $e) {
        print  "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function printMovies($sqlQuery) {

    $index = 0; //Counting index for our table
    global $dbh; //this is how we refer to our global $dbh up top.

    try {
        foreach ($dbh->query($sqlQuery) as $result) {
            echo "<tr><td class=\"index\">";
            echo $index + 1 . "</td>";
            echo "<td class=\"movie\">";
            echo $result['name'] . "</td>";
            echo "<td class=\"year\">";
            echo $result['year'] . "</td>";
            echo "</td></tr>";
            $index++;
        }
        $dbh = null; //terminate connection to database.
    } catch (PDOException $e) {
        print  "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

//q4 use for search queries
function q4(){
     global $dbh; //this is how we refer to our global $dbh up top.
     $pieces = explode(" ", $_SESSION['actorName']);
     echo $pieces[0] .="\n";
     echo $pieces[1] .= "\n";
     $sql = "SELECT * FROM actors WHERE actors.last_name = ? AND actors.first_name = ?))";
     $actor= "filler\n";
     try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $sql = 'SELECT * FROM actors
                WHERE first_name LIKE :fname
                AND last_name LIKE :lname ORDER by film_count DESC';

            // prepare statement for execution
            $q = $pdo->prepare($sql);

            // pass values to the query and execute it
            $q->execute([':fname' => 'K%', ':lname' => 'B%']);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Could not connect to the database $dbname :" . $e->getMessage());
            }
    echo $actor;
    return $actor;
}


function twoDegrees()
{

    global $dbh;
    if (!isset($_SESSION['actorName'])) {
        echo "actor name session not set";
    }

    $query = "Select actors.first_name,actors.last_name from actors where actors.id in (SELECT actors.id FROM actors   "
            . "WHERE actors.id in(Select roles.actor_id from roles where roles.movie_id in"
            . "(  select roles.movie_id from roles where roles.actor_id in(  "
            . "Select roles.actor_id from roles where roles.movie_id in  "
            . "(select roles.movie_id from roles WHERE roles.actor_id = 22591))))) "
            . "and actors.id not in "
            . "(SELECT actors.id FROM actors   "
            . "WHERE actors.id in(Select roles.actor_id from roles where roles.movie_id in  "
            . "(select roles.movie_id from roles WHERE roles.actor_id = 22591)))";


$index = 0; //Counting index for our table

    try {
        foreach ($dbh->query($query) as $result) {
            echo "<tr><td class=\"index\">";
            echo $index + 1 . "</td>";
            echo "<td class=\"FirstName\">";
            echo $result['first_name'] . "</td>";
            echo "<td class=\"LastName\">";
            echo $result['last_name'];
            echo "</td></tr>";
            $index++;
        }
        $dbh = null; //terminate connection to database.
    } catch (PDOException $e) {
        print  "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

}

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


