<?php

include_once 'Handlers/DataBaseHandler.php';
include_once 'Handlers/NotifyHandler.php';
include_once 'Handlers/TableHandler.php';
include_once 'Handlers/GuardHandler.php';
include_once 'Handlers/FormHandler.php';
include_once 'Models/Users.php';
include_once 'Models/Products.php';
include_once 'Models/Orders.php';

session_start();
$dataBaseHandler = new DataBaseHandler('mysql', 'localhost', 'super-market', 'root', '');
$notify_handler = new NotifyHandler($_SESSION);
$guard_handler = new GuardHandler($_SESSION);
$form_handler = new FormHandler();
$users = new Users($dataBaseHandler->get_connection());
$products = new Products($dataBaseHandler->get_connection());
$orders = new Orders($dataBaseHandler->get_connection());