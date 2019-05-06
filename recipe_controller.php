<?php
/**
 * Created by PhpStorm.
 * User: ossem1
 * Date: 1-4-2019
 * Time: 09:16
 */

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: index.php');
    exit;
}

require 'config.php';

if ($_POST['type']== 'create'){

    if (is_numeric($_POST['userid']) == false){
        header('location: create.php');
        exit;
    }
    else {
        $user_id = trim($_POST['userid']);
    }

    if ($_POST['title'] == null){
        $Message = urlencode("This field is required.");
        header("Location:create.php?Message=".$Message);
        exit;
    }
    else{
        $title = trim($_POST['title']);
    }

    if ($_POST['description'] == null){
        $Message = urlencode("This field is required.");
        header("Location:create.php?Message=".$Message);
        exit;
    }
    else{
        $description = trim($_POST['description']);
    }

    if ($_POST['ingredients'] == null){
        $Message = urlencode("This field is required.");
        header("Location:create.php?Message=".$Message);
        exit;
    }
    else{
        $ingredients = trim($_POST['ingredients']);
    }

    if ($_POST['picture'] == null){
        $pictureurl = "https://via.placeholder.com/250";
    }
    else{
        $pictureurl = trim("img/" . $_POST['picture']);
    }

    $timemade = gmdate('Y-m-d h:i:s');


    $sql = "INSERT INTO recipes (created_at, user_id, title, description, ingredients, picture_url)
            VALUES (:created_at, :user_id, :title, :description, :ingredients, :picture_url)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':created_at' => $timemade,
        ':user_id' => $user_id,
        ':title'    => $title,
        ':description' => $description,
        ':ingredients' => $ingredients,
        ':picture_url' => $pictureurl
    ]);
    header('location: index.php');
    exit;
}

if ($_POST['type']== 'delete'){
    $id         = $_GET['id'];
    $sql        = "DELETE FROM recipes WHERE id = :id";
    $prepare    = $db->prepare($sql);
    $prepare->execute([
        ':id'   => $id
    ]);
    header('location: index.php');
    exit;
}

if ($_POST['type']== 'edit'){
    $timeupdated = gmdate('Y-m-d h:i:s');
    $id = $_GET['id'];
    $sql = "UPDATE recipes SET
    updated_at = :updated_at,
    user_id  = :user_id,
    title     = :title,
    description  = :description,
    ingredients = :ingredients,
    picture_url = :picture_url
  WHERE id    = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':updated_at' => $timeupdated,
        ':user_id' => trim($_POST['userid']),
        ':title'    => trim($_POST['title']),
        ':description' => trim($_POST['description']),
        ':ingredients' => trim($_POST['ingredients']),
        ':picture_url' => trim($_POST['picture']),
        ':id'       => $id
    ]);
    $Message = urlencode("recipe edit complete.");
    header("location: detail.php?id=$id;>Message=".$Message);
    exit;
}