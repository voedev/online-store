<?php


namespace app\controllers\admin;


use app\models\AppModel;

class MainController extends AppController
{
    public function indexAction()
    {
        new AppModel();

        $countUsers = \R::count('user');
        $countOrder = \R::count('order', "status = '0'");
        $countCategory = \R::count('category');
        $countProduct = \R::count('product');

        $this->set(compact('countUsers', 'countOrder', 'countCategory', 'countProduct'));
        $this->setMeta('Главная страница', 'Панель управления', 'Панель управления');
    }
}