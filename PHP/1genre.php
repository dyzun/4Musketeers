<?php
/**
 * Created by PhpStorm.
 * User: michaelkovalsky
 * Date: 1/18/17
 * Time: 7:15 PM
 */

//select MG.genre, count(*) from movies_genres MG group by MG.genre HAVING COUNT(mg.movie_id) =
//    (SELECT COUNT(mg1.movie_id) totalCount
//                 FROM movies_genres mg1
//                 GROUP BY mg1.genre
//                 ORDER BY totalCOunt
//                 DESC LIMIT 1);
