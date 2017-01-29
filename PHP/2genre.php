<?php
 # author: Veronica McManus
try {
    session_start();
//    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    include ("common.php");

    # query: actors with max. number of movies of a user-given genre
    
    $sql = "SELECT actors.first_name, actors.last_name, actors.gender, MG.genre,
    count(roles.movie_id) as MovieCount
    FROM movies_genres MG
    INNER JOIN roles ON roles.movie_id = MG.movie_id
    INNER JOIN actors ON roles.actor_id = actors.id
    WHERE MG.genre = ?
    GROUP BY MG.genre, roles.actor_id
    ORDER BY MovieCount DESC LIMIT 1";


    $genres = explode(" ", $_SESSION['genre']);

    if(!$q = $dbh->prepare($sql)) {
        echo "error in prepare";
    }

    if(!$q->execute($genres)) {
        echo "error in execution";
    } # maybe this works? maybe should be $q->execute(_GET['selection']);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>2genre</title>
    </head>
    <body>
        <div id="container">
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
