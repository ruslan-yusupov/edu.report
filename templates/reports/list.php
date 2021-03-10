<?php

use App\View;

/**
 * @var View $this
 */


$names = [];
$days = [];

$datesPeriod = new DatePeriod(new DateTime('2021-03-01'), new DateInterval('P1D'), new DateTime('2021-03-31'));

foreach ($datesPeriod as $date) {
    $days[] = $date->format('d');
}

foreach ($days as $day) {
    $names[] = 'Иванов Иван ' . $day;
}

?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dist/bundle.css">
    <title>Список контактов</title>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <?php foreach ($days as $day) {?>
                            <th scope="col">
                                <?php echo $day; ?>
                            </th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($names as $name) {?>
                    <tr>
                        <th scope="row">
                            <?php echo $name; ?>
                        </th>
                        <?php foreach ($days as $day) {?>
                            <td>
                                <?php echo $day; ?>
                            </td>
                        <?php }?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <script src="/dist/bundle.js"></script>
</body>
</html>