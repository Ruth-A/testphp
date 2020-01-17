Тестовое задание

## Задание
https://github.com/adminko/testphp

## Требования к системе
1. php 7.0
2. mySql 5.7
3. Apache 2.4

## Установка/настройка
1. Скопировать файлы в рабочую папку
2. Импортировать MySQL дамп `testphp_db.sql`
3. Настроить доключение к базе данных в config/db_params.php

## Тезническое описание
1. index - точка входа

2. components/Autoload - автозагрузка классов
3. components/Db - подключение к базе данных
4. components/Router - обработчик маршрутов

5. config/db_params - параметры подключения к базе данных
6. config/routes - маршруты
7. controllers/UserController - контроллер работы с пользователями
8. controllers/TerritoryController - контроллер работы с ajax запросами к таблице адресов

9. models/User - Модель для работы с данными таблицы users
10. models/Territory - Модель для работы с данными таблицы t_koatuu_tree

11. views/index - страница со списком всех пользователей/главная страница
12. views/registration - страница регистрации
13. views/card - страница информации об отдельном пользователе
14. views/page_404 - страница 404
15. views/layouts/header - шапка сайта
16. views/layouts/footer - подвал сайта
