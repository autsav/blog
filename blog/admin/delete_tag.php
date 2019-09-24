<?php 
$id	= $_GET['id'];
require_once "class/tag.class.php";
$tag = new Tag();
$tag->id = $id;
echo $tag->remove();
?>
<a href="list_tag.php">Go Back</a>




