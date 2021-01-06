<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->getMeta() . PHP_EOL ?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="megamenu/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="feather/feather.min.css">
</head>

<body>

<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">
                        <select id="currency" tabindex="4" class="dropdown drop">
                            <?php new \app\widgets\currency\Currency(); ?>
                        </select>
                    </div>
                    <p class="recently-text"><a href="product/recently">Просмотренные товары</a></p>
                    <div class="clearfix"></div>
                </div>
                <div></div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="cart/show" onclick="getCart(); return false">
                        <div class="total">
                            <img src="images/cart-1.png" alt="Корзина" />
                            <?php if( !empty($_SESSION['cart']) ): ?>
                                <span class="simpleCart_total"><b><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'] ?></b></span>
                            <?php else: ?>
                              <span class="simpleCart_total">0</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="/"><h1>Luxury Watches</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-8 header-left">
                <div class="menu-container">
                    <div class="menu">
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/menu.php',
                            'attributes' => [
                                'id' => 'menu'
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="col-md-4 header-right">
                <div class="search-bar">
                    <form action="search" method="GET" autocomplete="off">
                        <input type="text" id="typeahead" name="s" class="typeahead" placeholder="Найти">
                        <input type="submit" value="">
                    </form>
<!--                    <input type="text" placeholder="Поиск">-->
<!--                    <input type="submit" value="">-->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if( isset($_SESSION['errors']) ): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
                </div>
                <?php endif; ?>

                <?php if( isset($_SESSION['success']) ): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?= $content ?>
</div>
<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Подписывайтесь</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Информация</h3>
                <ul>
                    <li>
                        <a href="#">
                            <p>Specials</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>New Products</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>Our Stores</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <p>Contact Us</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>Top Sellers</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Мой аккаунт</h3>
                    <ul>
                        <?php if(!empty($_SESSION['user'])): ?>
                            <li><a href="#">Добро пожаловать, <?= h( $_SESSION['user']['name'] ) ?></a></li>
                            <li><a href="user/logout">Выход</a></li>
                        <?php else: ?>
                            <li><a href="user/login">Войти в личный кабинет</a></li>
                            <li><a href="user/register">Зарегистрировать аккаунт</a></li>
                        <?php endif; ?>
                    </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Контакты</h3>
                <h4>Artem Kurdin, Web Developer</h4>
                <h5>+7 952 101-88-51</h5>
                <p><a href="mailto:kurdinartem60@gmail.com">kurdinartem60@gmail.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
            </div>
            <div class="col-md-6 footer-right">
                <p>© <?= date('Y') ?> Luxury Watches. Все права защищены</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Modal Cart -->
<div id="cart" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Продолжить покупки</button>
                <a href="cart/view" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="preloader"><img src="images/ring.svg" alt="Загрузка"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="megamenu/js/megamenu.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function() {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: false,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script src="js/imagezoom.js"></script>
<?php
  $currency = \shop\App::$app->getProperty('currency');
?>
<script>
    var path = '<?= PATH ?>',
        course = '<?=$currency['value'] ?>',
        symbolLeft = '<?=$currency['symbol_left'] ?>',
        symbolRight = '<?=$currency['symbol_right'] ?>';
</script>
<script defer src="js/jquery.flexslider.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/validator.min.js"></script>
<script type="text/javascript">
    $(function() {
    
        var menu_ul = $('.menu_drop > li > ul'),
               menu_a  = $('.menu_drop > li > a');
        
        menu_ul.hide();
    
        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });
    
    });
</script>   
<script>

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails",

  });
});
</script>
<script src="js/app.js"></script>

<?php

if(DEBUG){
    $logs = \R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    debug( $logs->grep( 'SELECT' ) );
    echo PHP_EOL;
}
?>
</body>
</html>