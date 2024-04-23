
<?php
    $routes = [];
    $base = '/';

    route($base, function () {
        header('Location: '.$base.'home');
    });
    
    route(''.$base.'home', function () {
        include("pages/home-page/home.php");
    });
    
    route(''.$base.'domka', function () {
        include("pages/domka-questionnaire-page/domka.php");
    });
    
    route(''.$base.'michal', function () {
        include("pages/mitko-questionnaire-page/mitko.php");
    });
    
    route('/404', function () {
        echo "Page not found";
    });
    
    function route(string $path, callable $callback) {
        global $routes;
        $routes[$path] = $callback;
    }
    
    run();
    
    function run() {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
        foreach ($routes as $path => $callback) {
            if ($path !== $uri) continue;
    
            $found = true;
            $callback();
        }
    
        if (!$found) {
            $notFoundCallback = $routes['/404'];
            $notFoundCallback();
        }
    }
?>