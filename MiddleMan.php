<?php

    echo $_POST['selection'];
    if(isset($_POST['selection'])) {
        switch($_POST['selection']):
            case '1deg':
                $name = $_POST['fname'];
                echo $name;
                session_start();
                $_SESSION['actorName'] = $name;
                header('Location:PHP/1degree.php');
                break;
            case '2deg':
                header('Location:PHP/2degree.php');
                break;
            case '1gen':
                header('Location:PHP/1genre.php');
                break;
            case '2gen':
                header('Location:PHP/2genre.php');
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
