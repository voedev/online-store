<?php


namespace app\widgets\menu;


use shop\App;
use shop\Cache;

class Menu
{
    protected $data;
    protected $tree; // массив дерева данных
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 0; // время кэша
    protected $cacheKey = 'shop_menu'; // ключ кэша
    protected $attributes = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    // Получение опций при построении меню
    // Запись пути до шаблона в атрибут $tpl
    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }


    protected function run()
    {
        // Кюширование категорий
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);

        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('categories');

            if (!$this->data) {
                $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);

            if ($this->cache) {
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }

        }
        $this->output();
    }

    protected function output()
    {
        $menuAttributes = '';
        if (!empty($this->attributes)) {
            foreach ($this->attributes as $property => $value ) {
                $menuAttributes .= " $property = '$value' ";
            }
        }
        echo "<$this->container $menuAttributes>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</$this->container>";
    }

    // Получает из массива дерево-меню
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    // формирует html-код меню и разделяет его по разделеителю
    protected function getMenuHtml($tree, $tab = ' ')
    {
        $string = '';
        foreach ($tree as $id => $category) {
            $string .= $this->categoriesToTemplate($category, $tab, $id);
        }
        return $string;
    }

    // Берёт категорию из шаблона и формирует html-код
    // Параметр: категория, разделитель, id-категории
    protected function categoriesToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}