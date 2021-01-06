<?php


namespace app\widgets\Filter;


use shop\Cache;

class Filter
{
    public $group;
    public $attrs;
    public $tpl;

    public function __construct()
    {
        $this->tpl = __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    public function run()
    {
        $cache = Cache::instance();
        $this->group = $cache->get('filter_group');
        if (!$this->group) {
            $this->group = $this->getGroups();
            $cache->set('filter_group', $this->group, 1);
        }

        $this->attrs = $cache->get('filter_attrs');

        if (!$this->attrs) {
            $this->attrs = self::getAttrs();
            $cache->set('filter_attrs', $this->attrs, 1);
        }

        $filters = $this->getHtml();
        echo $filters;

    }

    // Получает все группы из таблицы group
    protected function getGroups()
    {
         return \R::getAssoc('SELECT id, title FROM attribute_group');
    }

    protected static function getAttrs()
    {
        $data = \R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach ($data as $k => $v) {
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }

    protected function getHtml()
    {
        ob_start();
        $filter = self::getFilters();
        if (!empty($filter)) {
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    public static function getFilters()
    {
        $filter = null;
        if (!empty($_GET['filter'])) {
            $filter = preg_replace("#[^\d,]+#", '', $_GET['filter']);
            $filter = trim($filter, ',');
        }
        return $filter;
    }

    public static function getCountGroups($filter)
    {
        $filters = explode(',', $filter);
        $cache = Cache::instance();
        $attrs = $cache->get('filter_attrs');

        if (!$attrs) {
            $attrs = self::getAttrs();
        }

        foreach ($attrs as $key => $item) {
            foreach ($item as $k => $v) {
                if (in_array($k, $filters)) {
                    $data[] = $key;
                    break;
                }
            }
        }
        return count($data);
    }
}