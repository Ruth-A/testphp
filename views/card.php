<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">

      <div class="card">
        <div class="card-header">
        id: <?php echo $user['id'] ?>
        </div>
        <div class="card-body">
          <h5 class="card-title">ФИО: <?php echo $user['full_name'] ?></h5>
          <h6 class="card-subtitle mb-2 text-muted">email: <?php echo $user['email'] ?></h6>
          <p class="card-text">Адрес: <?php echo $user['address'] ?></p>
        </div>
      </div>

    </div> 
  </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>