<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:16
 */

require 'header.php';
?>
    <h1>Create new recipe.</h1>
    <form action="recipe_controller.php" method="post">
        <input type="hidden" name="type" value="create">
        <div>
            <label for="userid">User id:</label>
            <input type="text" name="userid" id="userid">
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required >
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea type="text" name="description" id="description" required rows="5" ></textarea>
        </div>

        <div>
            <label for="ingredients">Ingredients:</label>
            <textarea type="text" name="ingredients" id="ingredients" rows="5" required></textarea>
        </div>

        <div>
            <label for="picture">Picture url:</label>
            <input type="text" name="picture" id="picture">
        </div>

        <input type="submit" value="Create a new recipe.">
    </form>
    <a href="index.php">Home</a>
<?php
require 'footer.php';
?>