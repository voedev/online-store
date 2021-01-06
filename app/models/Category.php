<?php


namespace app\models;

use shop\App;

class Category extends AppModel
{
    public static function getIds($id)
    {
        $categories = App::$app->getProperty('categories');
        $ids = null;

        foreach ($categories as $k => $v) {
            if ($v['parent_id'] == $id) {
                $ids .= $k . ',';
                $ids .= self::getIds($k);
            }
        }
        return $ids;
    }
}