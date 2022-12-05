<?php

try
    {
    if (isset($_GET['article_id'])) // Get article_id from URL 
        {
        require_once ('./connection_db/Dbconnection.php'); // call the connection config
        $idVal      = $_GET['article_id'];
        $currentUser= $_SESSION['user_name'];
        $idVal      = trim($idVal);
        $database   = new Database();  
        $articleid  = mysqli_real_escape_string($database->connection, $idVal);
        $tmp_array  = array();
        // add new code
        $query       = "SELECT* FROM articles,users WHERE article_id=" . $articleid . " and author = '".$currentUser."'";
        $result      = $database->query($query);
        
        if ($result->num_rows > 0)
            {
            while ($row = mysqli_fetch_assoc($result)) // here we draw the page according to data came from data base
                {
                echo ' <h3>' . $row["title"] . '</h3>';
                echo ' <p class=\"byline\"><small> Created on ' . $row["publish_date"] . ' by ' . $row["first_name"] . ' ' . $row["last_name"] . ' (' . $row["role"] . ')</small> </p>';
                echo $row["text"];
                }
            }
        else
            {
            header("Location: index.php");
            exit;
            }

        }
    }
//catch exception
catch(Exception $e)
    {
    echo 'Message: ' . $e->getMessage();
    }
?>
