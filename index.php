<?php
require_once 'core/config.php';
require_once 'controllers/FrontController.php';

$pdo = new Database();
include('views/head.php');

$front = new FrontController();
$front->run($pdo);

include('views/foot.php');
?>
