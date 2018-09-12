
<?php
if (empty($errors)) {
  $users = R::dispense('users');
  $users->name = $data['name'];
  $users->surname = $data['surname'];
  $users->email = $data['email'];
  $users->password = password_hash($data['password'], PASSWORD_DEFAULT);
  $users->root = 0;
  R::store($users);
  ?>
  <script type="text/javascript">
    alert('Вы успешно зарегистрированы')
  </script>
  <?php

} else {
  echo '<span style="color: red">'.array_shift($errors).'</span>';
}
?>