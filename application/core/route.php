<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $recParam = '';

        $uri = $_SERVER['REQUEST_URI'];
        $recParam = substr(stristr($uri, '?'), 1);

        $uri = stristr($uri, '?', true);
        $routes = explode('/', $uri);
        //echo $_SERVER['REQUEST_URI'];
//        for ($i = 2; $i<sizeof($routes); $i++)
//        {
//            echo $routes[$i]."+";
//        }
        // получаем имя контроллера
        if (!empty($routes[2])) {
            $controller_name = $routes[2];
        }
        // получаем имя экшена
        if (!empty($routes[3])) {
            $action_name = $routes[3];
        }

        // добавляем префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        /*
        echo "Model: $model_name <br>";
        echo "Controller: $controller_name <br>";
        echo "Action: $action_name <br>";
        */
        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }
        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {
            // вызываем действие контроллера
            $controller->$action_name($recParam);
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}
