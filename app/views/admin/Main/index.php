<main class="o-page__content">
    <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle js-sidebar-toggle">
            <i class="feather icon-align-left"></i>
        </button>

        <h2 class="c-navbar__title"><a href="<?= ADMIN ?>">Главная страница</a></h2>

        <div class="c-avatar c-avatar--xsmall">
            <span class="c-icon c-icon--success" style="color: #fff"><? echo h(mb_substr($_SESSION['user']['name'], 0, 1)); ?></span>
        </div>

    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="c-card">
            <?php if($countOrder): ?>
                <span class="c-icon c-icon--danger u-mb-small">
                  <i class="feather icon-shopping-cart"></i>
                </span>
                    <h3 class="c-text--subtitle">Не принятых заказов</h3>
                    <h1><?= $countOrder ?></h1>
                    <a href="<?= ADMIN ?>/order" style="text-decoration: underline">Просмотреть</a>
            <?php else: ?>
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="feather icon-check-circle"></i>
                </span>
                <h3 class="c-text--subtitle">Не принятых заказов нет</h3>
            <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="c-card">
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="feather icon-box"></i>
                </span>

                    <h3 class="c-text--subtitle">Всего товаров</h3>
                    <h1><?= $countProduct ?></h1>
                    <a href="<?= ADMIN ?>/product" style="text-decoration: underline">Узнать больше</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="c-card">
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="feather icon-users"></i>
                </span>

                    <h3 class="c-text--subtitle">Всего пользователей</h3>
                    <h1><?= $countUsers ?></h1>
                    <a href="<?= ADMIN ?>/user" style="text-decoration: underline">Узнать больше</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="c-card">
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="feather icon-clipboard"></i>
                </span>

                    <h3 class="c-text--subtitle">Всего категорий</h3>
                    <h1><?= $countCategory ?></h1>
                    <a href="<?= ADMIN ?>/category" style="text-decoration: underline">Узнать больше</a>
                </div>
            </div>
        </div>
    </div>
</main>