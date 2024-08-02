<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once  __DIR__ . "/../vendor/larapack/dd/src/helper.php";

use App\Models\Fruits;
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$count = $_POST['count'];

$fruitsModel = new Fruits();

$fruits = $fruitsModel->update(['id' => $id, 'title'=> $title, 'price' => $price, 'count'=> $count]);
header('Location: /home');



