<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actors Who Direct</title>

        <!--CSS File Link-->
        <link href="../CSS/bacon.css" type="'text/css" rel="stylesheet /">
    </head>

<body>

    <div id="main">
        <h1>Actors Who Directed</h1>

        <table>
            <tr>
                <td class="index">#</td>
                <td class="FirstName">First Name</td>
                <td class="LastName">Last Name</td>
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

</body>

</html>

