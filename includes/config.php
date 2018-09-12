<?php
// Если у тебя на сервере имя и пароль другое - смени здесь, в файле конфигурации.
require './php/rb.php';

R::setup( 'mysql:host=localhost;dbname=social', 'root', '' );