<?php

/**
 * Контроллер UserController
 */
class UserController
{

    //Список всех пользовтелей
    public function index()
    {
        // Получаем список
        $users = User::getAll();

        require_once(ROOT . '/views/index.php');
        return true;
    }

    //Регисрация нового пользователя
    public function register()
    {
        // Флаг результата
        $result = false;

        // Если форма отправлена 
        if (isset($_POST['submit'])) {
            // Получаем данные из формы
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            //Проверяем указынный email в БД
            $id = User::CheckEmail($email);
            //Если есть, возращаем карточку пользователя
            if($id) {
                header("Location: /user/$id");
                exit;
            }

            // Создаем пользователя
            $result = User::create($fullName, $email, $address);
        }

        //Получаем список регионов
        $regions = Territory::getRegions();

        require_once(ROOT . '/views/registration.php');
        return true;
    }

    //Страница отдельного пользователя
    public function show($id)
    {
        //Получаем позльвоателя по id
        $user = User::getUserById($id);

        if($user == false) {
            return false;
        }

        require_once(ROOT . '/views/card.php');
        return true;
    }

}
