<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 1/18/17
 * Time: 7:16 PM
 */

$dsn = 'mysql:host=localhost:3306;dbname=GIS';
$user = 'root'; //Insert your username in here when testing.
$pass = 'password';//Insert your password in here when testing.
$dbh = new PDO($dsn, $user, $pass);

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
     $sql = "SELECT id FROM actors WHERE actors.last_name = ? AND actors.first_name = ?))";
     $actor= "filler\n";
     try {
         $stm = $dbh->prepare($sql);
         $stm ->execute(array($pieces[1],$pieces[0]));
         while ($row = $stm->fetchColumn(0)) { //ERROR should assign id to $actor
             echo $row;
           $actor = $row;  
        }
        if($stm == false)//or  if(!$results)  or  if(count($results)==0)  or if($results == array())
        {
            $rest = substr($pieces[0], 0,1);
            echo $rest;
            $sql = "SELECT id FROM actors WHERE actors.last_name = ? AND actors.first_name LIKE %? Order by film_count DESC"; 
            $stm = $dbh->prepare($sql);
         $stm ->execute(array($pieces[1],$rest));
        $res = $stm->fetchColumn();//ERROR should assign id to $actor
            $actor = $res;
            echo $actor;
            echo "inner loop";
        }else{
            echo $actor;
            echo "outerloop";
            }
        $dbh = null; //terminate connection to database.
    } catch (PDOException $e) {
        print  "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
                echo $actor;

     return $actor;
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


