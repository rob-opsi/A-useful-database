<?php
    if(!isset($_SESSION)) { 
        session_start(); 
    }

    if(isset($_GET['id'])) {
        $genre = $_GET['id'];//this is the id for the genre in question
        include ('../inc/db_con.php');

        $select = mysqli_query($con, "SELECT * FROM items WHERE item_category='7' AND genre='$genre'");
        $number1 = mysqli_num_rows($select);

        

        if($number1==0) {
            mysqli_query($con,"DELETE FROM game_genre WHERE id='$genre'");
            echo '<script> alert("Genre Successfully Deleted!"); </script>';
            echo '<script> window.location.href = "../genre.php?genre=Game"; </script>';
        }
        else {
            echo '<script> alert("This genre has items associated with it. You are unable to delete a genre with items tied to it!"); </script>';
            echo '<script> window.location.href = "../genre.php?genre=Book"; </script>';
        }
    }
?>