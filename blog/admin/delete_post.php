<?php 
$id	= $_GET['id'];
require_once "class/post.class.php";
$post = new Post();
$post->id = $id;
echo $post->remove();
?>
<a href="list_post.php">Go Back</a>