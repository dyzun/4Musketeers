<?php
    //echo $_GET['selection'];
    session_start();
    if(isset($_GET['selection'])) {
        switch($_GET['selection']):
            case '1deg':
                $name = $_GET['fname'];
                //echo $name;
                $_SESSION['actorName'] = $name;
                header('Location:PHP/1degree.php');
                break;
            case '2deg':
                $name = $_GET['fname'];
                $_SESSION['actorName'] = $name;
                header('Location:PHP/2degree.php');
                break;
            case '1gen':
                header('Location:PHP/1genre.php');
                break;
            case '2gen':
                if(isset($_GET['genres'])) {
                    $genre = $_GET['genres'];
                    $_SESSION['genre'] = $genre;
                    header('Location:PHP/2genre.php');
                } else {
                    echo "genres not set";
                }
                break;
            case 'directors';
                header('Location:PHP/directors.php');
                break;
            default:
                header('Location:index.php');
                break;
        endswitch;
   } else {
        echo "Selection not set!";
      }
?>
