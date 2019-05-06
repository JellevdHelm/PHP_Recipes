<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:16
 */

require 'header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM recipes WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);
$recipe = $prepare->fetch(PDO::FETCH_ASSOC);

?>

    <h1>Edit user.</h1>
    <form action="recipe_controller.php?id=<?=$id;?>" method="post">

        <input type="hidden" name="type" value="edit">

        <div>
            <label for="userid">User id:</label>
            <input type="text" name="userid" id="userid" value="<?= htmlentities($recipe['user_id']); ?>">
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required value="<?= htmlentities($recipe['title']); ?>">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea type="text" name="description" id="description" required rows="5"><?= htmlentities($recipe['description']); ?></textarea>
        </div>

        <div>
            <label for="ingredients">Ingredients:</label>
            <textarea type="text" name="ingredients" id="ingredients" required rows="5"><?= htmlentities($recipe['ingredients']); ?></textarea>
        </div>

        <div>
            <label for="picture">Picture url:</label>
            <input type="text" name="picture" id="picture" value="<?= htmlentities($recipe['picture_url']); ?>">
        </div>

        <input type="submit" value="Edit recipe.">
    </form>
    <a href="index.php">Home</a>
<?php
require 'footer.php';
?>