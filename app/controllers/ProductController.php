<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Product;

class ProductController extends AppController
{
	public function viewAction()
	{
		$alias = $this->route['alias'];
		$product = \R::findOne('product', "alias = ? AND status = '1' ", [$alias]);

		if (!$product) {
			throw new \Exception("Товар снят с продажи", 404);
		}

		// Gallery
        $gallery = \R::findAll("gallery", "product_id = ?", [$product->id]);

		/* Viewed products module
		 * Writing to cookies of the requested product
		 */
        $productModel = new Product();
        $productModel->setRecentlyViewed($product->id);

        // Products viewed
        $recentlyViewed = $productModel->getRecentlyViewed();
        $recentlyViewedPrint = null;

        if ( $recentlyViewed) {
            $recentlyViewedPrint = \R::find('product', 'id IN (' . \R::genSlots($recentlyViewed) . ') LIMIT 3', $recentlyViewed);
        }

        // Breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

        // Modification product
        $mods = \R::findAll('modification', 'product_id = ?', [$product->id]);

		// Related Products
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ? LIMIT 3", [$product->id]);

		$this->setMeta($product->title, $product->description, $product->keywords);

		$this->set(compact('product', 'related', 'gallery', 'recentlyViewedPrint', 'breadcrumbs', 'mods'));
	}

	public function recentlyAction()
    {
        $productModel = new Product();

        $recentlyViewed = $productModel->getAllRecentlyViewed();

        $recentlyViewedPrint = null;

        if ($recentlyViewed) {
            $recentlyViewedPrint = \R::find('product', 'id IN (' . \R::genSlots($recentlyViewed) . ')', $recentlyViewed);
        }

        $this->setMeta('Просмотренные товары', 'Все мои просмотренные товары', 'Товары, мои товары');
        $this->set(compact('recentlyViewedPrint'));
    }
}