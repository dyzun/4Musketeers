<?php
ini_set('short_open_tag', 'on');
$destination = 'index.php';
?>
<html><form id="searchForm" action="<?=$destination?>" method="post">
    Name: <input type="text" name="fname"><br>
    1 degree: <input type="radio"> | 2 degrees: <input type="radio"> | Top genres by number: <input type="radio"> | Top actors by genre: 
      <select name="genreList" form="searchForm">
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

