<?php


namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Category;
use app\widgets\Filter\Filter;
use shop\App;
use shop\libs\Pagination;


class CategoryController extends AppController
{

    public function viewAction()
    {
        $alias = $this->route['alias'];
        $category = \R::findOne('category', 'alias = ?', [$alias]);
        
        if (!$category) {
            throw new \Exception('Страница не найдена', 404);
        }

        // Хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        // Получение всех вложенных категорий
        $ids = Category::getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        // Пагинация
        // Номер текущей страницы
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Кол-во выводимых товаров на странице
        $perpage = App::$app->getProperty('pagination');

        // Filters
        $sql_part = '';
        
        if (!empty($_GET['filter'])) {
            $filter = Filter::getFilters();
            
            if ($filter) {
                $count = Filter::getCountGroups($filter);
                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter) GROUP BY product_id HAVING COUNT(product_id) = $count )";
            }
        }

        $total = \R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();


        $products = \R::find("product", "category_id IN ($ids) $sql_part LIMIT $start, $perpage");

        if ($this->isAjax()) {
            $this->loadView('filter', compact('products', 'pagination', 'total'));
        }

        $this->setMeta('Категория: ' . $category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }

}
