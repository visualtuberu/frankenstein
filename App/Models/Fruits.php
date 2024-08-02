<?php

namespace App\Models;

use App\Application\database\Model;

class Fruits extends Model
{
    protected string $table = 'fruits';
    protected array $fields = ['title', 'price', 'count'];

    protected string $title;
    protected string $price;
    protected int $count;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }
    public function setCount(int $count): void
    {
        $this->count = $count;
    }
}