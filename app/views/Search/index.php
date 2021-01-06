<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Поиск по сайту</li>
            </ol>
        </div>
    </div>
</div>

<?php
$curr = \shop\App::$app->getProperty('currency');
$categories = \shop\App::$app->getProperty('categories');
?>

<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <?php if($productSe): ?>
        <h4 class="mb-5">Результаты поиска по запросу: <b class="ml-3"><?= h($query) ?></b></h4>
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <div class="product-one">
                    <?php foreach ($productSe as $k => $item): ?>
                        <div class="col-md-3 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?= $item->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item->img ?>" alt="<?= $item->title ?>" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?= $item->alias ?>"><?= $item->title ?></a></h3>
                                    <p>Категория: <a href="category/<?=$categories[$item->category_id]['alias'] ?>"><?=$categories[$item->category_id]['title'] ?></a></p>
                                    <h4>
                                        <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item->id ?>"><i></i></a> <span class=" item_price">
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
        </div>
        <?php else: ?>
            <div class="alert alert-warning mb-3">По запросу <b><?= h($query) ?></b> товары не найдены.</div>
                <?php if($productHit): ?>
                <h4 class="mt-5 mb-4">Возможно, Вас заинтересуют следующие товары</h4>
                    <div class="prdt-top">
                        <div class="col-md-12 prdt-left">
                            <div class="product-one">
                                <?php foreach ($productHit as $k => $item): ?>
                                    <div class="col-md-3 product-left p-left">
                                        <div class="product-main simpleCart_shelfItem">
                                            <a href="product/<?= $item->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item->img ?>" alt="<?= $item->title ?>" /></a>
                                            <div class="product-bottom">
                                                <h3><a href="product/<?= $item->alias ?>"><?= $item->title ?></a></h3>
                                                <p>Категория: <a href="category/<?=$categories[$item->category_id]['alias'] ?>"><?=$categories[$item->category_id]['title'] ?></a></p>
                                                <h4>
                                                    <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item->id ?>"><i></i></a> <span class=" item_price">
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
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<!--product-end-->