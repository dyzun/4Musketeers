<?php
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="GET" action="MiddleMan.php">
                Name: <input type="text" name="fname" value="name"><br>
                1 degree: <input type="radio" name="selection" value="1deg"> | 2 degrees: <input type="radio" name="selection" value="2deg"> |
                Directors/Actors: <input type="radio" name="selection" value="directors">
                | Top genres: <input type="radio" name="selection" value="1gen"> | Top actor by genre:
                  <select name="selection" form="searchForm" value="2gen">
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
    </body>
</html>


