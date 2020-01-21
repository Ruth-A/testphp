<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Chosen CSS -->
    <!--<link rel="stylesheet" href="/plugins/chosen/docsupport/style.css">-->
    <link rel="stylesheet" href="/public/plugins/chosen/chosen.css">

  </head>
  <body>

    <nav class="nav justify-content-center">
        <a class="nav-link" href="/">Список пользователей</a>
        <a class="nav-link" href="registration">Регистрация</a>
    </nav>

<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-6">
                
                <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        Вы зарегистрированы!
                    </div>
                <?php endif; ?>
                    <div class="signup-form">
                        <h2 style="font-size: 1.5rem; text-align: center;">Регистрация нового пользователя</h2>

                        <form id="form" action="#" method="post">

                            <div class="form-group">
                                <label for="full_name">ФИО</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Фамилия Имя Отчество">
                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email">
                            </div>

                            <label>Адрес</label>

                            <div class="form-group" id="group-region">

                                <select id="region" data-placeholder="Выбирите область" class="chosen-select" tabindex="1" style="width:100%;">
                                    <option value=""></option>
                                    <?php foreach($regions as $region) : ?>
                                        <option value="<?php echo $region['id'] ?>"><?php echo $region['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group" id="group-city">

                                <select id="city" name="address" data-placeholder="Выбирите город" class="chosen-select" tabindex="2" style="width:100%;">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="form-group" id="group-district">

                                <select name="address" id="district" data-placeholder="Выбирите район" class="chosen-select" tabindex="3" style="width:100%;">
                                    <option value=""></option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary" style="margin: 0 auto; display: block;">Регистрация</button>

                        </form>
                    </div>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
    
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

    <script src="/public/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="/public/plugins/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

    <script src="/public/js/address_ajax.js"></script>
    <script src="/public/js/form_validate.js"></script>
  </body>
</html>