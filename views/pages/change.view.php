<?php
use App\View\View;
use App\Models\Fruits;

View::component('head');
?>
    <title>Document</title>
</head>
<body>
<h2 class="p-3">Home page</h2>
<?= View::component('nav') ?>

<?php
$id = $_POST['id'];
$model = new Fruits();
$data = $model->find('id', "$id");
$counter = 1;
?>

<form action="/actions/update.php" method="post" class="p-3">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" name="title" class="form-control" id="title" value="<?= $data['title']?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input type="number" name="price" class="form-control" id="price" value="<?= $data['price']?>" required>
    </div>
    <div class="mb-3">
        <label for="count" class="form-label">Количество</label>
        <input type="number" name="count" class="form-control" id="count" value="<?= $data['count']?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Изменить</button>
</form>
</body>
</html>
