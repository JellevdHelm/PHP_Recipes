<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:15
 */

require 'config.php';
$sql = "SELECT * FROM recipes ORDER BY created_at DESC";
$query = $db->query($sql);
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

    <h1>Recipes:</h1>

<?php
echo '<ul>';
foreach ($recipes as $recipe){
    $title = htmlentities($recipe['title']);
    echo"<li><a href='detail.php?id={$recipe['id']}'>$title</a></li>";
}
echo '</ul>';
?>

    <a href="create.php">Create a new recipe.</a>

<?php
require 'footer.php';
?>