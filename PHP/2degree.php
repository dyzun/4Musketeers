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

    <div id="2degree">
        <h1>Actors Who are 2 degrees from Kevin Bacon</h1>

        <table class="table table-bordered table-condensed">
            <tr>
                <td class="index">#</td>
                <td class="FirstName">First Name</td>
                <td class="LastName">Last Name</td>
            </tr>
            <?php
                include ("common.php");

                //creating out sql query.
                
                $baconid = baconId();//Bacon's id pulled from the table for use in queries
                
                //printDirectors($sql);
            ?>
        </table>

    </div>

</body>

</html>

