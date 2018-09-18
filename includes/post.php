<?php 
require 'config.php';
$data = $_POST;
if (trim($data['post_text']) == '') {
  $post_errors[] = "Вы не ввели ебучий текст";
} 
if (empty($post_errors)) {
  $posts = R::dispense('posts');
  $posts->id_user = $_SESSION['logged_user']->id;
  $posts->date = date('Y-m-d H:i:s');
  $posts->text = $data['post_text'];
  $posts->image = $data['post_image'];
  R::store($posts);
  echo "Все отправлено,все хорошо";
 } else {
  echo '<span style="color: red">'.array_shift($post_errors).'</span>';
}

?>