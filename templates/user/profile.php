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
      action="/profile/<?php echo $this->user->id; ?>">
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
    <input type="hidden" name="id" value="<?php echo $this->user->id; ?>">

    <label for="login"
           class="sr-only">
        Логин
    </label>
    <input type="text"
           id="login"
           class="form-control"
           name="login"
           readonly
           placeholder="Логин"
           value="<?php echo $this->user->login; ?>">

    <label for="email"
           class="sr-only">
        Email
    </label>
    <input type="text"
           id="email"
           class="form-control"
           name="email"
           placeholder="Email"
           value="<?php echo $this->user->email; ?>">

    <label for="name"
           class="sr-only">
        Имя
    </label>
    <input type="text"
           id="name"
           class="form-control"
           name="name"
           placeholder="ФИО"
           value="<?php echo $this->user->name; ?>">

    <label for="phone"
           class="sr-only">
       Номер телефона
    </label>
    <input type="text"
           id="phone"
           class="form-control"
           name="phone"
           placeholder="Номер телефона"
           value="<?php echo $this->user->phone; ?>">

    <label for="class"
           class="sr-only">
       Группа
    </label>
    <input type="text"
           id="class"
           class="form-control"
           name="class"
           readonly
           placeholder="Группа"
           value="<?php echo $this->user->class; ?>">

    <label for="role"
           class="sr-only">
       Должность
    </label>
    <input type="text"
           id="role"
           class="form-control"
           name="role"
           readonly
           placeholder="Должность"
           value="<?php echo $this->user->role; ?>">

    <label for="oldPassword"
           class="sr-only">
        Старый пароль
    </label>
    <input type="password"
           id="oldPassword"
           name="old_password"
           class="form-control"
           value=""
           placeholder="Старый пароль">

    <label for="password"
           class="sr-only">
        Пароль
    </label>
    <input type="password"
           id="password"
           name="password"
           class="form-control"
           value=""
           placeholder="Пароль">

    <label for="confirmPassword"
           class="sr-only">
        Подтвердите пароль
    </label>
    <input type="password"
           id="confirmPassword"
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