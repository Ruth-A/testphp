<?php

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

    //Свойство для хранения массива роутов
    private $routes;

    public function __construct()
    {
        // Путь к файлу с роутами
        $routesPath = ROOT . '/config/routes.php';

        // Получаем роуты из файла
        $this->routes = include($routesPath);
    }

    //Метод для обработки запроса
    public function run()
    {
        //Статус запроса
        $result = false;

        // Получаем строку запроса
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        // Проверяем наличие запроса в массиве маршрутов
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, метод, параметр

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $methodName = array_shift($segments);

                $parameter = $segments;

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

                //Вызываем необходимый метод класса с заданным параметром
                $result = call_user_func_array(array($controllerObject, $methodName), $parameter);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }

        //Если сопадений в маршрутах не найдено, вернуть 404 страницу
        if ($result != true) {
            require_once(ROOT . '/views/page_404.php');
        }
    }

}
