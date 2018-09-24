<?php
require 'config.php';
$id_post = $_POST[delete_post];
R::exec('DELETE FROM `posts` WHERE `id` = '.$id_post.';');
?>           