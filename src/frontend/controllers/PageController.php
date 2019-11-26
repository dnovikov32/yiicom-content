<?php

namespace yiicom\content\frontend\controllers;

use yiicom\common\base\Controller;
use yiicom\content\common\models\Page;
use yiicom\content\frontend\traits\SitePageTrait;

class PageController extends Controller
{
    use SitePageTrait;

    public function actionView($id)
    {
        /* @var Page $page */
		$page = $this->loadModel(Page::class, $id);

		return $this->render($this->getTemplate($page), [
		    'page' => $page
        ]);
    }

}
