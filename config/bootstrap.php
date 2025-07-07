<?php

use Dotenv\Dotenv;


require_once "../config/middlewares.php";
require_once "../Route/route.web.php";

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();