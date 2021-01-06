<?php

namespace app\controllers;


class MainController extends AppController
{
    public function indexAction()
    {
        $brands = \R::find('brand', 'LIMIT 3');

        // Find bestseller
        $hits = \R::find('product', ' hit = "1" AND status = "1" LIMIT 8');

        $this->setMeta('Главная страница', 'Описание', 'Ключевые слова');
        $this->set(compact('brands', 'hits'));
    }
}