<!--banner-starts-->
<div class="bnr" id="home">
    <div id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/bnr-1.jpg" alt="" />
            </li>
            <li>
                <img src="images/bnr-2.jpg" alt="" />
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt="" />
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--about-starts-->
<?php if( !empty($brands) ): ?>
<div class="about">
    <div class="container">
        <h3 class="text-center" style="margin: 30px 0 20px">Популярные бренды</h3>
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand) : ?>
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="images/<?= $brand->img ?>" alt="<?= $brand->title ?>" />
                    <figcaption>
                        <h2><?= $brand->title ?></h2>
                        <p><?= $brand->description ?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--about-end-->
<!--product-starts-->
<?php if( !empty($hits) ): ?>
<?php $curr = \shop\App::$app->getProperty('currency');  ?>
<div class="product">
    <h3 class="text-center" style="margin: 30px 0 20px">Хиты продаж</h3>
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($hits as $hit): ?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?= $hit->alias ?>" class="mask">
                            <img class="img-responsive zoom-img" src="images/<?= $hit->img ?>" alt="<?= $hit->title ?>" />
                        </a>
                        <div class="product-bottom">
                            <h3>
                                <a href="product/<?= $hit->alias ?>"><?= $hit->title ?></a>
                            </h3>

                            <h4><a class="add-to-cart-link" data-id="<?= $hit->id ?>" href="cart/add?id=<?= $hit->id ?>"><i></i></a> <span class="item_price"><?= $curr['symbol_left'] ?> <?= $hit->price * $curr['value']  ?> <?= $curr['symbol_right'] ?>
                                    <?php if( $hit->old_price ): ?>
                                    <del> <?= $curr['symbol_left']?> <?=$hit->old_price * $curr['value'] ?> <?= $curr['symbol_right']?></del>
                                    <?php endif; ?>
                                </span></h4>
                        </div>
                        <div class="srch">
                            <?php if( $hit->old_price ) :
                                $sale = ( ($hit->price - $hit->old_price  ) / $hit->old_price ) * 100 ?>
                                <span><?= round($sale, 2) ?> %</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<!--product-end-->