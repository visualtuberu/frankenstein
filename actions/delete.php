<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Models\Fruits;

$id = $_POST['id'];

$fruitsModel = new Fruits();

$fruitsModel->delete($id);
header('location: /home');