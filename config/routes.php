<?php

return array(
    // Страница регистрации
    'registration' => 'user/register', // create() в UserController
    // Карточка пользователя
    'user/([0-9]+)' => 'user/show/$1', // show() в UserController

    // Запрос городов
    'ajaxcitys/([0-9]{10})' => 'territory/citysList/$1', // citysList() в TerritoryController
    // Запрос районов
    'ajaxdistricts/([0-9]{10})' => 'territory/districtsList/$1', // districtsList() в TerritoryController

    // Страница списка пользователй (Главная страница)
    'index.php' => 'user/index', // index() в UserController
    '^\s*$' => 'user/index', // index() в UserController

);
