<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/admin_tpl/">
    <meta charset="utf-8">
    <?php echo $this->getMeta(); ?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/neat.min.css">
</head>
<body>

<div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar">
            <div class="c-sidebar__brand">
                <a href="<?= ADMIN ?>"><img src="img/logo.svg" alt="Shop"></a>
            </div>

            <!-- Scrollable -->
            <div class="c-sidebar__body">
                <span class="c-sidebar__title">Меню</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="<?= ADMIN ?>">
                            <i class="c-sidebar__icon feather icon-home"></i>Главная
                        </a>
                    </li>
                </ul>

                <span class="c-sidebar__title">Основное</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="<?= ADMIN ?>/order">
                            <i class="c-sidebar__icon feather icon-shopping-cart"></i>Заказы
                            <?php if ($countOrder): ?>
                            <span class="c-badge c-badge--danger c-badge--small" style="margin-left: 10px;"><?= $countOrder ?></span>
                            <?php endif;?>
                        </a>
                    </li>

                    <li class="c-sidebar__item has-submenu">
                        <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false" aria-controls="sidebar-submenu">
                            <i class="c-sidebar__icon feather icon-clipboard"></i>Категории
                        </a>

                        <div>
                            <ul class="c-sidebar__list collapse" id="sidebar-submenu">
                                <li><a class="c-sidebar__link" href="<?= ADMIN ?>/category">Все категории</a></li>
                                <li><a class="c-sidebar__link" href="<?= ADMIN ?>/category/add"><i class="c-sidebar__icon feather icon-plus"></i>Добавить</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="c-sidebar__link" href="<?= ADMIN ?>/cache">
                            <i class="c-sidebar__icon feather icon-disc"></i>Кэширование
                        </a>
                    </li>

                    <li class="c-sidebar__item has-submenu">
                        <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu2" aria-expanded="false" aria-controls="sidebar-submenu2">
                            <i class="c-sidebar__icon feather icon-box"></i>Товары
                        </a>

                        <div>
                            <ul class="c-sidebar__list collapse" id="sidebar-submenu2">
                                <li><a class="c-sidebar__link" href="<?= ADMIN ?>/product/">Все товары</a></li>
                                <li><a class="c-sidebar__link" href="<?= ADMIN ?>/product/add"><i class="c-sidebar__icon feather icon-plus"></i>Добавить товар</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <span class="c-sidebar__title">Пользователи</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="<?= ADMIN ?>/user/">
                            <i class="c-sidebar__icon feather icon-users"></i>Все пользователи
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="<?= ADMIN ?>/user/add">
                            <i class="c-sidebar__icon feather icon-user-plus"></i>Добавить
                        </a>
                    </li>
                </ul>
            </div>


            <a class="c-sidebar__footer" href="<?= ADMIN ?>/logout/" style="color: #ED4F4F">
                Выход <i class="c-sidebar__footer-icon feather icon-log-out"></i>
            </a>
        </aside>
    </div>

    <?= $content ?>
</div>

<!-- Main JavaScript -->
<script src="js/neat.min.js?v=1.0"></script>

<script>
    var path = '<?php echo PATH ?>',
        adminPath = '<?php echo ADMIN ?>'

</script>

</body>
</html>