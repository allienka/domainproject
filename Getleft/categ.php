<?php
try {
    require_once('./connection_db/Dbconnection.php');
    $database = new Database();
    $query    = "SELECT category_id,name FROM categories ORDER BY order_number ASC";
    $result   = $database->query($query);
    echo '<div class="cards">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href=\"./index.php?categ_id=" . $row["category_id"] . "\" class=\"card\">" . $row["name"] . "</a>";
    }
    echo '</div> ';
}
catch (Exception $e) {
    //catch exception
    echo "Message: " . $e->getMessage();
}
?>