<?php
global $guard_handler;
include_once 'init.php';
$guard_handler->validate($_SESSION['type']);
session_unset();
session_destroy();
header('Location: login.php');