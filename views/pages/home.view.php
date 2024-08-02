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
$model = new Fruits();
$data = $model->findMany('id','>=', '0');
$counter = 1;
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Count</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($data as $value): ?>
            <tr>
                  <th scope="row"><?= $counter++?></th>
                  <td><?=$value['title']?></td>
                  <td><?=$value['price']?></td>
                  <td><?=$value['count']?></td>
                  <td>
                      <form method="post" action="/change">
                          <input type="hidden" name="id" value="<?= $value['id']?>">
                          <button class="btn btn-warning" type="submit">Изменить</button>
                      </form>

                  </td>
                <td>
                    <form method="post" action="/actions/delete.php">
                        <input type="hidden" name="id" value="<?= $value['id']?>">
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
    <?php endforeach ?>


  </tbody>
</table>
<form action="/actions/add.php" method="post" class="p-3">
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input type="number" name="price" class="form-control" id="price" required>
    </div>
    <div class="mb-3">
        <label for="count" class="form-label">Количество</label>
        <input type="number" name="count" class="form-control" id="count" required>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
</body>
</html>
