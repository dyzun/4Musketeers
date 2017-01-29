<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actors Who Are 2 Degrees from Kevin Bacon</title>

        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--CSS File Link-->
        <link href="../CSS/bacon.css" type="text/css" rel="stylesheet /">
    </head>

<body>
    <div id ="frame">
    <div id="2degree">
        <h1>Actors Who are 2 degrees from Kevin Bacon</h1>

        <table class="table table-bordered table-condensed">
            <tr>
                <th class="index">#</th>
                <th class="FirstName">First Name</th>
                <th class="LastName">Last Name</th>
            </tr>
            <?php

                include ("common.php");

                //creating out sql query.
                
                $baconid = baconId();//Bacon's id pulled from the table for use in queries
                $sql1 = "CREATE TABLE bothPresent ("
                        . "SELECT DISTINCT actor_id, first_name, last_name FROM roles r6"
                        . "INNER JOIN (SELECT movie_id FROM roles r4 INNER JOIN( SELECT r1.actor_id FROM roles r1 INNER JOIN"
                        . "(SELECT movie_id FROM roles WHERE actor_id=".$baconid.") r2 ON r2.movie_id=r1.movie_id) r3 ON r4.actor_id=r3.actor_id)"
                        . "r5 on r6.movie_id=r5.movie_id INNER JOIN actors act ON r6.actor_id =id AND act.id !=".$baconid.");";
                
                $sql2 = "CREATE TABLE tmp ( SELECT DISTINCT a.id,a.first_name,a.last_name FROM actors a, roles r1"
                        . "INNER JOIN ( SELECT movie_id FROM roles WHERE actor_id =".$baconid.")r2 ON r2.movie_id=r1.movie_id WHERE a.id =".$baconid.");";
                
                $sql3 = "SELECT DISTINCT tmp.first_name, tmp.last_name"
                        . "FROM tmp LEFT JOIN bothPresent ON tmp.first_name AND bothPresent.first_name"
                        . "AND tmp.last_name AND bothPresent.last_name WHERE bothPresent.first_name IS NULL AND bothPresent.last_name IS NULL"
                        . "AND tmp.first_name ='Xander' AND tmp.last_name ='Berkeley';";
                
                twoDegrees();
            ?>
        </table>

    </div>
    </div>
</body>

</html>

