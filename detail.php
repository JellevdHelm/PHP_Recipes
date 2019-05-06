<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:16
 */

require 'config.php';
$id =$_GET['id'];
$sql = "SELECT * FROM recipes WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);
$recipe = $prepare->fetch(PDO::FETCH_ASSOC);
$img = $recipe['picture_url'];

require 'header.php';
?>
<div class="container">
    <h1><?php echo "{$recipe['title']}"; ?></h1>

    <div class="recipe_info">
        <ul>
            <img src="<?php echo $img ?>" alt="">
            <p><b>Ingredients: </b><?php echo htmlentities($recipe['ingredients']);?></p>
            <p><b>Description:</b><?php echo htmlentities($recipe['description']);?></p>
        </ul>
    </div>

    <form action="recipe_controller.php?id=<?=$id;?>" method="post">
        <input type="hidden" name="type" value="delete">
        <input type="submit" value="delete">
    </form>

    <a href="edit.php?id=<?=$id;?>">Edit recipe.</a>
    <a href="index.php">Home</a>
    <?php
    require 'footer.php';
    ?>
</div>