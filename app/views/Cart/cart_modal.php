<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive cart-view">
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
                    <td class="text-center" style="vertical-align: middle;"><span title="Удалить товар из корзины" data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td>Количество</td>
                    <td colspan="4" class="text-right cart-qty"><b><?= $_SESSION['cart.qty'] ?></b></td>
                </tr>
                <tr>
                    <td>Сумма</td>
                    <td colspan="4" class="text-right cart-sum">
                        <strong><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
<h4>Ваша корзина пуста.</h4>
<?php endif; ?>
