<?php


use App\Controllers\Authorization;
use App\Controllers\Contacts;
use App\Controllers\Error;
use App\Controllers\Index;
use App\Controllers\Profile;
use App\Controllers\Registration;
use App\Router;

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';


$router = new Router;

$router
    /* Contacts */
    ->add('GET', '/', [Index::class, 'index'])
    ->add('GET', '/list', [Contacts::class, 'index'])
    ->add('GET', '/list/(\d{1,10})', [Contacts::class, 'detail'])
    ->add('POST', '/list/(\d{1,10})/delete', [Contacts::class, 'delete'])
    ->add('POST', '/list/add', [Contacts::class, 'add'])
    /* Registration */
    ->add('GET', '/registration', [Registration::class, 'index'])
    ->add('POST', '/registration', [Registration::class, 'register'])
    /* Authorization */
    ->add('GET', '/auth', [Authorization::class, 'index'])
    ->add('POST', '/auth', [Authorization::class, 'auth'])
    ->add('GET', '/logout', [Authorization::class, 'logout'])
    /* Profile */
    ->add('GET', '/profile/(\d{1,10})', [Profile::class, 'index'])
    ->add('POST', '/profile', [Profile::class, 'update']);


try {

    $route = $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

    /**
     * @var App\Controller $controller
     */
    $controller = new $route['controllerName'];
    $controller->action($route['methodName'], $route['params']);

} catch (Exception $exception) {

    switch ($exception->getCode()) {
        case 404:
            $errorPage = new Error;
            $errorPage->index($exception->getMessage());
            break;
    }

}


/*
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/dist/bundle.css">
    <title>Document</title>
</head>
<body class="text-center">

<form class="form-signin"
      method="post"
      action="/">
    <img class="mb-4 logo"
         src="/assets/app/img/logo/logo.png"
         alt="logo">
    <h1 class="h3 mb-3 font-weight-normal">
        Авторизация
    </h1>
    <label for="inputEmail"
           class="sr-only">
        Email
    </label>
    <input type="email"
           id="inputEmail"
           class="form-control"
           placeholder="Email"
           required=""
           autofocus="">
    <label for="inputPassword"
           class="sr-only">
        Пароль
    </label>
    <input type="password"
           id="inputPassword"
           class="form-control"
           placeholder="Пароль"
           required="">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox"
                   value="remember-me">&nbsp;Запомнить меня
        </label>
    </div>
    <button class="btn btn-lg btn-primary"
            type="submit">
        Войти
    </button>
    <a href="javascript:void(0);" class="btn btn-lg btn-secondary">
        Зарегистрироваться
    </a>
    <p class="mt-5 mb-3 text-muted">
        © <?php echo date('Y'); ?>
    </p>
</form>

<script src="/dist/bundle.js"></script>
</body>

</html>
<?php */ ?>