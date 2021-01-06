<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Просмотренные товары</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->


<?php
    $curr = \shop\App::$app->getProperty('currency');
    $categories = \shop\App::$app->getProperty('categories');
?>

<div class="container mb-5">
    <?php if( $recentlyViewedPrint ) : ?>
        <div class="latestproducts">
            <h3>Просмотренные товары</h3>
            <div class="product-one">
                <?php foreach ($recentlyViewedPrint as $item): ?>
                    <div class="col-md-3 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="product/<?= $item['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item['img'] ?>" alt="<?= $item['title'] ?>" /></a>
                            <div class="product-bottom">
                                <h3><a href="product/<?= $item['alias'] ?>"><?= $item['title'] ?></a></h3>
                                <p>Категория: <a href="category/<?=$categories[$item->category_id]['alias'] ?>"><?=$categories[$item->category_id]['title'] ?></a></p>
                                <h4>
                                    <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item['id'] ?>"><i></i></a> <span class=" item_price">
                                        <?= $curr['symbol_left'] ?> <?= $item['price'] * $curr['value']  ?> <?= $curr['symbol_right'] ?>
                                        <?php if( $item['old_price'] ): ?>
                                            <del> <?= $curr['symbol_left']?> <?=$item['old_price'] * $curr['value'] ?> <?= $curr['symbol_right']?></del>
                                        <?php endif; ?>
                                    </span>
                                </h4>
                            </div>

                            <?php if( $item['old_price'] ) :
                                $sale = ( ($item['price'] - $item['old_price']  ) / $item['old_price'] ) * 100 ?>
                                <div class="srch"><span><?= round($sale, 2) ?> %</span></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php else: ?>
        <h5 class="alert alert-info">Список просмотренных товаров пуст</h5>
    <?php endif; ?>
</div>