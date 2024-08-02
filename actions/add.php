<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Models\Fruits;


$title = $_POST['title'];
$price = $_POST['price'];
$count = $_POST['count'];
$fields = [$title, $price, $count];

$fruitsModel = new Fruits();
$fruitsModel->setTitle($title);
$fruitsModel->setPrice($price);
$fruitsModel->setCount($count);

$fruitsModel->store();
header('location: /home');