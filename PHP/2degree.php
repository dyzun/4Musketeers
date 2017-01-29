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
                
                twoDegrees();
            ?>
        </table>

    </div>
    </div>
</body>

</html>

