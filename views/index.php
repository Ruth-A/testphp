<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-12">

    <?php if($users): ?>

      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">ФИО</th>
            <th scope="col">email</th>
            <th scope="col">Адрес</th>
          </tr>
        </thead>
        <tbody >

          <?php foreach($users as $user): ?>
            <tr>
            <th scope="row"><?php echo $user['id'] ?></th>
            <td><a href="user/<?php echo $user['id'] ?>"><?php echo $user['full_name'] ?></a></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['address'] ?></td>
          </tr>
          <?php endforeach ?>

        </tbody>
      </table>

      <?php else: ?>
        <div class="lead" style="text-align: center; margin-top: 20px;">Пользователй в базе данных нет</div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>