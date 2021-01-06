<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main mb-5">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Корзина</li>
            </ol>
        </div>
    </div>
</div>

<div class="container mb-8 mt-4">
    <?php if(!empty($_SESSION['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 80px;">Фото</th>
                    <th style="width: 350px;">Наименование</th>
                    <th style="width: 100px;">Количество</th>
                    <th style="width: 100px;">Цена 1 шт.</th>
                    <th style="width: 50px;"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $_SESSION['cart'] as $id => $item ): ?>
                    <tr>
                        <td class="text-center">
                            <a href="product/<?= $item['alias'] ?>">
                                <img id="img-modal" src="images/<?= $item['img'] ?>" alt="<?= $item['img'] ?>">
                            </a>
                        </td>
                        <td><a href="product/<?= $item['alias'] ?>"><?= $item['title'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right'] ?></td>
                        <td class="text-center" style="vertical-align: middle;"><a href="/cart/delete?id=<?= $id ?>"><span title="Удалить товар из корзины" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>Количество</td>
                    <td colspan="4" class="text-right cart-qty"><b><?= $_SESSION['cart.qty'] ?></b></td>
                </tr>
                <tr>
                    <td>Сумма</td>
                    <td colspan="4" class="text-right cart-sum">
                        <strong class="fz-20"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    <?php if(!isset($_SESSION['user'])): ?>

        <form method="post" action="cart/checkout" id="checkout" role="form" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Логин" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="pasword">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" data-minlength="6" data-error="Пароль должен содержать минимум 6 символов" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="address">Адрес</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Адрес" value="<?= isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '' ?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="address">Мои пожелания или примечания к заказу</label>
                <textarea name="note" id="note" class="form-control" cols="30" rows="10" value="<?= isset($_SESSION['form_data']['note']) ? h($_SESSION['form_data']['note']) : '' ?>"></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form
    <?php else: ?>
        <form method="post" action="cart/checkout" id="checkout" role="form" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="address">Мои пожелания или примечания к заказу</label>
                <textarea name="note" id="note" class="form-control" cols="30" rows="10" value="<?= isset($_SESSION['form_data']['note']) ? h($_SESSION['form_data']['note']) : '' ?>"></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
    <?php endif;?>

    <?php else: ?>
        <h2 class="mb-4">В корзине нет товаров.</h2>
    <?php endif; ?>
    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
</div>