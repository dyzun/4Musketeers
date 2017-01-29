<?php
 
try {
    session_start();
    include ("common.php");
    //$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    # query
    $sql = 'SELECT MG.genre, count(*) FROM movies_genres ';
    $sql .= 'MG group BY MG.genre HAVING COUNT(mg.movie_id) =';
    $sql .= '(SELECT COUNT(mg1.movie_id) totalCount FROM movies_genres mg1 ';
    $sql .= 'GROUP BY mg1.genre ORDER BY totalCount DESC LIMIT 1);';
 
    $q = $dbh->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database  :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>1genre test</title>
    </head>
    <body>
        <div id="frame">
        <div id="container">
            <h1>Actors</h1>
            <table>
                <thead>
                    <tr>
                        <th>Genre</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['genre']); ?></td>
                            <td><?php echo htmlspecialchars($row['count(*)']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>
