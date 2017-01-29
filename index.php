<?php
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--CSS File Link-->
        <link href="CSS/bacon.css" type="text/css" rel="stylesheet /">
    </head>
    <body>
           <div id="frame">
        <form method="GET" action="MiddleMan.php">
                Name: <input type="text" name="fname" value="name"><br>
                1 degree: <input type="radio" name="selection" value="1deg"><br>
                2 degrees: <input type="radio" name="selection" value="2deg"><br>
                Directors/Actors: <input type="radio" name="selection" value="directors"><br>
                Top genres: <input type="radio" name="selection" value="1gen"><br>
                Top actor by genre: <input type="radio" name="selection" value="2gen">
                  <select name="genres"  value="2gen">
                      <option selected disabled>Choose genre</option>
                      <option value="Action">Action</option>
                      <option value="Adventure">Adventure</option>
                      <option value="Animation">Animation</option>
                      <option value="Comedy">Comedy</option>
                      <option value="Crime">Crime</option>
                      <option value="Documentary">Documentary</option>
                      <option value="Drama">Drama</option>
                      <option value="Family">Family</option>
                      <option value="Fantasy">Fantasy</option>
                      <option value="Horror">Horror</option>
                      <option value="Music">Music</option>
                      <option value="Musical">Musical</option>
                      <option value="Mystery">Mystery</option>
                      <option value="Romance">Romance</option>
                      <option value="Sci-Fi">Sci-Fi</option>
                      <option value="Short">Short</option>
                      <option value="Thriller">Thriller</option>
                      <option value="War">War</option>
                      <option value="Western">Western</option>
                  </select>
                <br>
            <input type="submit" value="Submit">
        </form>
           </div>
    </body>
</html>


