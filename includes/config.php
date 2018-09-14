<?php
// Если у тебя на сервере имя и пароль другое - смени здесь, в файле конфигурации.
require 'rb.php';

R::setup( 'mysql:host=localhost;dbname=social', 'root', '' );
session_start();