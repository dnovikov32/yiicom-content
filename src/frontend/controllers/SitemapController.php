<?php

namespace yiicom\content\frontend\controllers;

use Yii;
use yiicom\common\base\Controller;
use yiicom\content\common\models\Sitemap;

class SitemapController extends Controller
{
    /**
     * Returns sitemap (default route: /sitemap.xml).
     */
    public function actionIndex()
    {
        $sitemap = Yii::createObject(Sitemap::class);

        header('Content-type: text/xml');

        exit($sitemap->xml());
    }

}
