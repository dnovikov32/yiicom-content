<?php

namespace yiicom\content\frontend\controllers;

use yiicom\common\base\Controller;
use yiicom\content\common\models\Category;
use yiicom\content\common\models\Page;
use yiicom\content\frontend\traits\SitePageTrait;

class CategoryController extends Controller
{
    use SitePageTrait;

    public function actionView($id)
    {
        /* @var Category $page */
		$category = $this->loadModel(Category::class, $id);

		return $this->render($this->getTemplate($category), [
		    'category' => $category
        ]);
    }

}
