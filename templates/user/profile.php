<?php

use App\View;

/**
 * @var View $this
 */

?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dist/bundle.css">
    <title>Регистрация</title>
</head>
<body class="text-center">

<form class="form"
      method="post"
      action="/profile">

    <h1 class="h3 mb-3 font-weight-normal">
        Профиль
    </h1>

    <?php
    if (!empty($this->alerts)) {
        foreach ($this->alerts as $alert) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $alert; ?>
            </div>
        <?php }
    } ?>

    <label class="sr-only">
        ID пользователя
    </label>
    <span>
        <?php echo $this->user->id; ?>
    </span>

    <label for="inputLogin"
           class="sr-only">
        Логин
    </label>
    <input type="text"
           id="inputLogin"
           class="form-control"
           name="login"
           placeholder="Логин"
           value="<?php echo $this->user->login; ?>">

    <label for="inputEmail"
           class="sr-only">
        Email
    </label>
    <input type="text"
           id="inputEmail"
           class="form-control"
           name="email"
           placeholder="Email"
           value="<?php echo $this->user->email; ?>">

    <label for="inputName"
           class="sr-only">
        Имя
    </label>
    <input type="text"
           id="inputName"
           class="form-control"
           name="name"
           placeholder="Имя"
           value="<?php echo $this->user->name; ?>">

    <label for="inputPhone"
           class="sr-only">
       Номер телефона
    </label>
    <input type="text"
           id="inputPhone"
           class="form-control"
           name="phone"
           placeholder="Номер телефона"
           value="<?php echo $this->user->phone; ?>">

    <label for="inputGroup"
           class="sr-only">
       Группа
    </label>
    <input type="text"
           id="inputGroup"
           class="form-control"
           name="class"
           readonly
           placeholder="Группа"
           value="<?php echo $this->user->class; ?>">

    <label for="inputGroup"
           class="sr-only">
       Должность
    </label>
    <input type="text"
           id="inputRole"
           class="form-control"
           name="role"
           readonly
           placeholder="Должность"
           value="<?php echo $this->user->role; ?>">

    <label for="inputOldPassword"
           class="sr-only">
        Старый пароль
    </label>
    <input type="password"
           id="inputOldPassword"
           name="old_password"
           class="form-control"
           value=""
           placeholder="Старый пароль">

    <label for="inputPassword"
           class="sr-only">
        Пароль
    </label>
    <input type="password"
           id="inputPassword"
           name="password"
           class="form-control"
           value=""
           placeholder="Пароль">

    <label for="inputConfirmPassword"
           class="sr-only">
        Подтвердите пароль
    </label>
    <input type="password"
           id="inputConfirmPassword"
           name="confirm_password"
           class="form-control"
           value=""
           placeholder="Подтвердите пароль">

    <button class="btn btn-lg btn-primary"
            type="submit">
        Обновить
    </button>

    <a href="/logout" class="btn btn-lg btn-secondary">
        Выйти
    </a>

    <p class="mt-5 mb-3 text-muted">
        © <?php echo date('Y'); ?>
    </p>

</form>

<script src="/dist/bundle.js"></script>
</body>

</html>