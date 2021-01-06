<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Главная</a></li>
                <li class="active">Войти</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->

<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>Войти</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 col-md-offset-3">
                            <form method="post" action="user/login" id="login" role="form" data-toggle="validator">
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
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </form>
                        </div>
                        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->
