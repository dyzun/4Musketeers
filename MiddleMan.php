<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/22/2017
 * Time: 3:09 PM
 */

    switch($_POST['selection']):
        case '1deg':
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
    endswitch;
