<?php
    if(!isset($_SESSION)) { 
        session_start(); 
    }

    if(isset($_GET['id'])) {
        $genre = $_GET['id'];//this is the id for the genre in question

        include ('../inc/db_con.php');

        $result = mysqli_query($con, "SELECT * FROM items WHERE item_category='6' AND genre='$genre'");

            
        if(mysqli_num_rows($result)==0) {
            mysqli_query($con,"DELETE FROM music_genre WHERE id='$genre'");
            echo '<script> alert("Genre Successfully Deleted!"); </script>';
            echo '<script> window.location.href = "../genre.php?genre=Music"; </script>';
        }
        else {
            echo '<script> alert("This genre has items associated with it. You are unable to delete a genre with items tied to it!"); </script>';
            echo '<script> window.location.href = "../genre.php?genre=Music"; </script>';
        }
                
    }
?>