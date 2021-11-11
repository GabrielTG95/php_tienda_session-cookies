<?php
session_start();
unset($_SESSION['usuario'],$_SESSION['login']);
session_destroy();
header('Refresh: 0; URL=/tienda/index.php');