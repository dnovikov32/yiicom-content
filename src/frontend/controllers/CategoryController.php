<?php

namespace yiicom\content\frontend\controllers;

use Yii;
use yii\data\Pagination;
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

		$pagesQuery = Page::find()
            ->withUrl()
            ->withFiles()
            ->withCategory()
            ->category([$category->id])
            ->orderBy(['createdAt' => SORT_DESC]);

		$page = (int) Yii::$app->request->get('page', 0);
		$pageSize = Yii::$app->params['pagination']['pageSize'];
		$pagination = new Pagination([
            'totalCount' => $pagesQuery->count(),
		    'route' => $category->url->alias,
            'params' => ['page' => $page],
            'forcePageParam' => false,
            'pageSize' => $pageSize,
            'defaultPageSize' => $pageSize,
        ]);

        $pages = $pagesQuery->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
		return $this->render($this->getTemplate($category), [
		    'category' => $category,
            'pages' => $pages,
            'pagination' => $pagination,
        ]);
    }

}
