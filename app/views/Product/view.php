<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?= $breadcrumbs ?>
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

<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
            <div class="sngl-top">
                <div class="col-md-5 single-top-left">
                    <?php if( $gallery ): ?>
                    <div class="flexslider">
                          <ul class="slides">
                              <?php foreach( $gallery as $img ): ?>
                            <li data-thumb="images/<?= $img['img'] ?>">
                                <div class="thumb-image"> <img src="images/<?= $img['img'] ?>" data-imagezoom="true" class="img-responsive" alt="<?= $product->title ?>"/> </div>
                            </li>
                            <?php endforeach; ?>
                          </ul>
                    </div>
                    <?php else: ?>
                        <img title="<?= $product->title ?>" src="images/<?= $product->img ?>" alt="<?= $product->title ?>">
                    <?php endif; ?>

                </div>
                <div class="col-md-7 single-top-right">
                    <div class="single-para simpleCart_shelfItem">
                    <h2><?= $product->title ?></h2>
                        <div class="star-on">
                            <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>
                            <?php
                              if( $product->hit ):
                            ?>
                            <div class="review">
                                <a>Хит продаж</a>
                            </div>
                            <?php endif;?>
                        <div class="clearfix"> </div>
                        </div>

                        <h5 class="item_price" id="base-price" data-base="<?= $product->price * $curr['value'] ?>">
                            <?= $curr['symbol_left'] ?> <?=$product->price * $curr['value']?> <?=$curr['symbol_right']?>
                        </h5>
                        <h3>
                            <?php if( $product->old_price ): ?>
                                <del id="base-old-price" data-old-base="<?= $product->old_price * $curr['value'] ?>">
                                    <?= $curr['symbol_left']?> <?=$product->old_price * $curr['value'] ?> <?= $curr['symbol_right']?>
                                </del>
                            <?php endif; ?>
                        </h3>
                        <?php if( $product->old_price ) :
                            $sale = ( ($product->price - $product->old_price )  / $product->old_price ) * 100 ?>
                            <span style="padding-left: 10px; color: #73B6E1; font-size: 15px;"><?= round($sale, 2) ?> %</span>
                        <?php endif; ?>
                        <p><?= $product->content ?></p>
                        <?php if($mods): ?>
                            <div class="available">
                                <ul>
                                    <li>Цвет
                                        <select>
                                            <option>Выбрать цвет</option>
                                            <?php foreach ($mods as $mod): ?>
                                                <option data-title="<?= $mod->title ?>" data-price="<?= $mod->price * $curr['value'] ?>" data-old-price="<?= $mod->old_price * $curr['value'] ?>" value="<?= $mod->id ?>"><?= $mod->title ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                        <?php endif;?>


                        <ul class="tag-men">
                            <li><span>Категория:
                                    <a href="category/<?=$categories[$product->category_id]['alias'] ?>"><?=$categories[$product->category_id]['title'] ?></a>
                                </span>
                        </ul>
                        <div class="quantity">
                            <input type="number" value="1" min="1" max="3" pattern="[0-9]" name="quantity" class="form-control">
                        </div>
                        <div>
                            <a id="add-product" href="cart/add?id=<?= $product->id ?>" class="add-to-cart-link btn btn-success mt-16" data-id="<?= $product->id?>">Добавить в корзину</a>
                        </div>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="tabs">
                <ul class="menu_drop">
            <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
                <ul>
                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
                <ul>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
                <ul>
                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                    <li class="subitem2"><a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
                <ul>
                    <li class="subitem2"><a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
                <ul>
                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                    <li class="subitem2"><a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
        </ul>
            </div>
            <?php if( $related ) :?>
            <div class="latestproducts">
                <h3>С этим товаром покупают</h3>
                <div class="product-one">
                    <?php foreach ($related as $item): ?>
                    <div class="col-md-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="product/<?= $item['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item['img'] ?>" alt="<?= $item['title'] ?>" /></a>
                            <div class="product-bottom">
                                <h3><a href="product/<?= $item['alias'] ?>"><?= $item['title'] ?></a></h3>
                                <p>Категория: <a href="category/<?=$categories[$product->category_id]['alias'] ?>"><?=$categories[$product->category_id]['title'] ?></a></p>
                                <h4>
                                    <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item['id'] ?>"><i></i></a> <span class=" item_price">
                                        <?= $curr['symbol_left'] ?> <?= $item['price'] * $curr['value']  ?> <?= $curr['symbol_right'] ?>
                                        <?php if( $item['old_price'] ): ?>
                                            <del> <?= $curr['symbol_left']?> <?=$item['old_price'] * $curr['value'] ?> <?= $curr['symbol_right']?></del>
                                        <?php endif; ?>
                                    </span></h4>
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
            <?php endif; ?>


                <?php if( $recentlyViewedPrint ) : ?>
                    <div class="latestproducts">
                        <h3>Просмотренные товары</h3>
                        <div class="product-one">
                            <?php foreach ($recentlyViewedPrint as $item): ?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="product/<?= $item['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item['img'] ?>" alt="<?= $item['title'] ?>" /></a>
                                        <div class="product-bottom">
                                            <h3><a href="product/<?= $item['alias'] ?>"><?= $item['title'] ?></a></h3>
                                            <p>Категория: <a href="category/<?=$categories[$product->category_id]['alias'] ?>"><?=$categories[$product->category_id]['title'] ?></a></p>
                                            <h4>
                                                <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item['id'] ?>"><i></i></a> <span class=" item_price">
                                        <?= $curr['symbol_left'] ?> <?= $item['price'] * $curr['value']  ?> <?= $curr['symbol_right'] ?>
                                                    <?php if( $item['old_price'] ): ?>
                                                        <del> <?= $curr['symbol_left']?> <?=$item['old_price'] * $curr['value'] ?> <?= $curr['symbol_right']?></del>
                                                    <?php endif; ?>
                                    </span></h4>
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
                        <div class="text-center">
                            <a href="product/recently" class="btn btn-info">Показать все мои просмотренные товары</a>
                        </div>
                    </div>
                <?php endif; ?>

        </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Categories</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>Brand</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Colour</h4>
                            <ul class="w_nav2">
                                <li><a class="color1" href="#"></a></li>
                                <li><a class="color2" href="#"></a></li>
                                <li><a class="color3" href="#"></a></li>
                                <li><a class="color4" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                                <li><a class="color12" href="#"></a></li>
                                <li><a class="color13" href="#"></a></li>
                                <li><a class="color14" href="#"></a></li>
                                <li><a class="color15" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                            </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-single-->