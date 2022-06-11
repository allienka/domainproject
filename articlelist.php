
<?php
require_once('./connection_db/Dbconnection.php');
//$database = new Database("localhost", "root", "", "domain_db");
$database = new Database();
$query = "SELECT * FROM articles ORDER BY publish_date DESC LIMIT 3";
$result = $database->query($query);
echo '<ul> <li> <h2>Latest articles</h2><ul>';
while($row = mysqli_fetch_assoc($result)) {

  echo "<li><a href=\"./index.php?article_id=".$row["article_id"]."\">" . $row["title"]."</a></li>";
}
echo '</ul></li></ul> ';
?>
