<?php


namespace app\models;


class Product extends AppModel
{
    // Добавить просмотренный товар
    public function setRecentlyViewed($id)
    {
        $recentlyViewed = $this->getAllRecentlyViewed();
        if (!$recentlyViewed) {
            setcookie('recentlyViewed', $id, time() + 3600 * 36, '/');
        } else {
            if (!in_array($id, $recentlyViewed)) {
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.', $recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time() + 3600 * 36, '/');
            }

        }
    }

    // Метод считывает просмотренный товар
    public function getRecentlyViewed()
    {
        if (!empty($_COOKIE['recentlyViewed'])) {
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed = explode('.', $recentlyViewed);
            return array_slice($recentlyViewed, -3);
        }

        return false;

    }

    public function getAllRecentlyViewed()
    {
        if (!empty($_COOKIE['recentlyViewed'])) {
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            return explode('.', $recentlyViewed);
        }

        return false;
    }
}