<?php


namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function registerAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')) {
                    $_SESSION['success'] = 'Вы успешно зарегистрировались';

                    if ($user->login()) {
                        $_SESSION['success'] = 'Вы успешно вошли в свой аккаунт';
                    }

                } else {
                    $_SESSION['errors'] = 'Произошла ошибка, пожалуйста, попробуйте позже.';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация', 'Регистрация на сайте', 'Регистрация, создать аккаунт');
    }

    public function loginAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            if ($user->login()) {
                $_SESSION['success'] = 'Вы успешно вошли в свой аккаунт';
            } else {
                $_SESSION['errors'] = 'Неверно введены логин или пароль';
                $_SESSION['form_data'] = $data;
            }
            redirect();
        }

        $this->setMeta('Войти', 'Войти', 'Войти');

    }

    public function logoutAction()
    {
        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
            redirect('login');
        } else {
            throw new \Exception('Страница не найдена', 404);
        }
    }

}