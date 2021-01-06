<?php


namespace app\controllers;


class SearchController extends AppController
{

    public function indexAction()
    {
        $query = !empty( trim($_GET['s']) ) ? trim($_GET['s']) : null;

        if ($query) {
            $productSe = \R::find('product', "title LIKE ?", ["%{$query}%"]);

            if (!$productSe) {
                $productHit = \R::find('product', 'hit = "1" AND status = "1" LIMIT 50');
            }
            $this->setMeta("Поиск по: " . h($query), 'Поиск по сайту', 'Поиск, найти товар, поиск по сайту, поиск по товару' );
            $this->set(compact('productSe', 'query', 'productHit'));
        }
    }

    public function typeaheadAction()
    {
        if ($this->isAjax()) {

            $query = !empty(trim($_GET['query']) ) ? trim($_GET['query']) : null;

            if ($query) {
                $product = \R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 11', ["%{$query}%"]);
                echo json_encode($product);
            }
        }

        die;
    }
}