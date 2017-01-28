<?php
 # author: Veronica McManus
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    # query: actors with max. number of movies of a user-given genre
    
    $sql = 'SELECT actors.first_name, actors.last_name, actors.gender, MG.genre, ';
    $sql .= 'count(roles.movie_id) as MovieCount';
    $sql .= 'FROM movies_genres MG';
    $sql .= 'INNER JOIN roles ON roles.movie_id = MG.movie_id';
    $sql .= 'INNER JOIN actors ON roles.actor_id = actors.id';
    $sql .= 'WHERE MG.genre = ?'; # user defined genre here
    $sql .= 'GROUP BY MG.genre, roles.actor_id';
    $sql .= 'ORDER BY MovieCount DESC LIMIT 1';
 
    $q = $pdo->prepare($sql); 
    $q->execute([_GET['selection']]); # maybe this works? maybe should be $q->execute(_GET['selection']);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>2genre</title>
    </head>
    <body>
        <div id="container">
            <h1>2genre.php</h1>
            <h1>Actors</h1>
            <table>
                <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Gender</th>
                      <th>Genre</th>
                      <th>MovieCount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                          <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                          <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                          <td><?php echo htmlspecialchars($row['gender']); ?></td> 
                          <td><?php echo htmlspecialchars($row['genre']); ?></td> 
                          <td><?php echo htmlspecialchars($row['MovieCount']); ?></td>                   
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
