
<?php
 try {
    if (isset($_GET["categ_id"])) {
        require_once ('./connection_db/Dbconnection.php'); // call the connection config
        $database   = new Database();  
        $idVal      = $_GET['categ_id'];
        $idVal      = trim($idVal);
        $categ_id   = mysqli_real_escape_string($database->connection, $idVal);
        $query      = " SELECT title,text,article_id  FROM articles WHERE category_id=" . $categ_id . "";
        $result     = $database->query($query);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // here we draw the page according to data came from data base
                echo '<div class="catdetails"> <h4>' .
                    $row["title"] .
                    "</h4> <p>";
                $txtnew = displaytxt(
                    strip_tags($row["text"]),
                    $row["article_id"]
                );
                echo $txtnew . "</p></div>";
            }
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
catch (Exception $e) {
        //catch exception
       echo "Message: " . $e->getMessage();
    }
    function displaytxt($string, $id) // display part of the  article
    {
        if (strlen($string) > 700) {
            // truncate string
            $stringCut  = substr($string, 0, 700);
            $endPoint   = strrpos($stringCut, " ");
            //if the string doesn't contain any space then it will cut without word basis.
            $string     = $endPoint
                ? substr($stringCut, 0, $endPoint)
                : substr($stringCut, 0);
            $string .=
                '<br/> <br/> <a  href=\'./index.php?article_id=' .
                $id .
                '\'>Read More>></a>';
        }
        return $string;
    }

?>
