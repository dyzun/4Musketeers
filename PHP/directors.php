<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actors Who Direct</title>

        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--CSS File Link-->
        <link href="../CSS/bacon.css" type="text/css" rel="stylesheet /">
    </head>

<body>
    <div id="frame">
    <div id="directors">
        <h1>Actors Who Directed</h1>

        <table class="table table-bordered table-condensed">
            <tr>
                <th class="index">#</th>
                <th class="FirstName">First Name</th>
                <th class="LastName">Last Name</th>
            </tr>
            <?php
                include ("common.php");

                //creating out sql query.
                $sql = "SELECT DISTINCT directors.first_name, directors.last_name";
                $sql.= " FROM directors, actors";
                $sql.= " WHERE directors.first_name = actors.first_name AND directors.last_name = actors.last_name";
                $sql.= " ORDER BY directors.first_name, directors.last_name";

                printDirectors($sql);
            ?>
        </table>

    </div>
    </div>
    
</body>

</html>

