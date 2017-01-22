<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
ini_set('short_open_tag', 'on');
$destination = 'index.php';
?>


<html>
    <form method="post" action="MiddleMan.php">
            Name: <input type="text" name="fname"><br>
            1 degree: <input type="radio" name="selection" value="1deg"> | 2 degrees: <input type="radio" name="selection" value="2deg"> |
            Directors/Actors: <input type="radio" name="selection" value="directors">
            | Top genres: <input type="radio" name="selection" value="1gen"> | Top actor by genre:
              <select name="selection" form="searchForm" value="2gen">
                  <option selected disabled>Choose genre</option>
                  <option value="Thriller">Thriller</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Action">Action</option>
                  <option value="Romantic">Romantic</option>
              </select>
            <br>
        <input type="submit" value="Submit">
    </form>
</html>


