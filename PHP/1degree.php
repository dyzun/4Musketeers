<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/18/17
 * Time: 7:15 PM
 */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>1 Degree</title>

        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--CSS File Link-->
        <link href="../CSS/bacon.css" type="text/css" rel="stylesheet /">
    </head>

    <?php
        session_start();
    ?>
<body>

    <div id="directors">
        <h1>Movies featuring Kevin Bacon and <?php echo $_SESSION['actorName']; ?> </h1>

        <table class="table table-bordered table-condensed">
            <tr>
                <td class="index">#</td>
                <td class="movie">Movie</td>
            </tr>
            <?php

                include ("common.php");
                $baconid = baconId();//Bacon's id pulled from the table for use in queries

                $pieces = explode(" ", $_SESSION['actorName']);


                echo $pieces[0];
                echo $pieces[1];
                $test= q4();
                echo $test;
                $sql = "SELECT DISTINCT movies.name FROM movies WHERE movies.id in";

                $sql .= "(Select roles.movie_id from roles where roles.actor_id = ";
                $sql .= "(SELECT actors.id FROM actors WHERE actors.last_name = '$pieces[1]' AND actors.first_name = '$pieces[0]'))";
                $sql .= " AND movies.id in (select roles.movie_id from roles WHERE roles.actor_id ="+$baconid+")";

                printMovies($sql);
            ?>
</table>

</div>

</body>

</html>